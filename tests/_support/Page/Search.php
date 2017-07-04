<?php
namespace Page;

class Search
{
    //locator for search field
    public static $searchField = '#lst-ib';
    //locator for search button
    public static $searchButton = 'input[name="btnK"]';
    //locator for result's body
    public static $resultsBody = '#ires';
    //locator for result's links
    public static $resultsLink = '#ires h3 a';

    /**
     * function for creating locator for result's cite
     * @param $resultNumber - number of result on page
     * @return string       - locator of cite for chosen result
     */
    public static function citeOfResultAtLine($resultNumber)
    {
        return static::$resultsBody . ' .g:nth-child(' . $resultNumber . ') cite';
    }
}
