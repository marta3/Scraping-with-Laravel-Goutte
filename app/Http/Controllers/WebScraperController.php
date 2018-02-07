<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Goutte\Client;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\DomCrawler\Crawler;

class WebScraperController extends Controller
{
    private $client;
    public $url;
    public $crawler;
    public $filters;
    public $contents= array();
    

    public function __construct(Client $client){
    	$this->client =$client;
    	if(!\Session::has('wishList')) \Session::put('wishList',array());
    }

    //Output the data through our filters

    public function getIndex(){
    	$this->url = "https://www.appliancesdelivered.ie/dishwashers";
    	$this->setScrapeUrl($this->url);
    	$this->filters=[
    		'title'=>'img[class="article-brand"]',
    		'url_img_prod'=> 'img[class="img-responsive"]',
    		'product'=> 'h4 > a',
    		'list'=>'ul',
    		'prices'=>'div[class="col-xs-12"] >h3'
    	];

    	return view('scraping.index')->with('contents',$this->getContents());
    }


    public function setScrapeUrl($url = NULL, $method='GET'){
    	$this->crawler=$this->client->request($method, $url);
    	return $this->crawler;
    }

    //Get the data from the defined url in our function setScrapeUrl
    public function getContents(){
    	return $this->contents = $this->startScraper();
    	
    }

    //Search our filter data and return an array of them
    private function startScraper(){
    	$countContents=$this->crawler->filter('div[class="search-results-product row"]')->count();

    	if($countContents){
    		$this->contents= $this->crawler->filter('div[class="search-results-product row"]')->each(function(Crawler $node, $i){
    			return[
    				'title'=>$node->filter($this->filters['title'])->attr('src'),
    				'url_img_prod'=>$node->filter($this->filters['url_img_prod'])->attr('src'),
    				'url_prod'=>$node->filter($this->filters['product'])->attr('href'),
    				'product' => $node->filter($this->filters['product'])->text(),
    				'list'=>$node->filter($this->filters['list'])->text(),
    				'prices'=>$node->filter($this->filters['prices'])->text()
    				
    			];

    		});
    	}

    	return $this->contents;
    }

}
