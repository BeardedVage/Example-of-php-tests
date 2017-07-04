<?php
use Page\Search;
use Step\Acceptance\SearchStep;

class googleSearchCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function searchingInGoogle(AcceptanceTester $I, SearchStep $search)
    {
        $I->wantTo('search in google "" and verify results');
        //opening a page from acceptance config (google)
        $I->amOnPage('/');
        $wordForSearching = 'Ortnec';

        //using stepObject for searching
        $search->searchBy($wordForSearching);

        //checking link of 1st result
        $I->canSee('http://ortnec.com', Search::citeOfResultAtLine(1));

        //grabing links of all results
        $links = $I->grabMultiple(Search::$resultsLink, 'href');

        //opening url, waiting for ajax and js, checking ‘ortnec’ text is present on opened page and than moving back
        foreach ($links as $link) {
            $I->amOnUrl($link);
            $I->waitPageLoad($I);
            $I->canSee($wordForSearching);
            $I->moveBack();
        }
    }
}
