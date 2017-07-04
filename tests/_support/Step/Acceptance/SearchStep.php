<?php
namespace Step\Acceptance;

use Page\Search;

class SearchStep extends \AcceptanceTester
{

    public function searchBy($text)
    {
        $I = $this;
        //filling search field
        $I->fillField(Search::$searchField, $text);
        //clicking on search button
        $I->click(Search::$searchButton);
        //waiting for results
        $I->waitForElementVisible(Search::$resultsBody);
    }

}