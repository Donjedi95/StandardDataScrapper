<?php

namespace App\Controller;

use App\Entity\Locality;
use App\Service\ScrapeCsvService;
use App\Service\ScrapeWikipediaService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScrapeController extends AbstractController
{
    /**
     * @Route("/scrape/iso_3166_country", name="wikipedia_iso3166_country")
     */
    public function scrapeWikipediaISO3166CountryData(): Response
    {
        $service = new ScrapeWikipediaService();

        return $this->render(
            'scrape\basic_scrape.html.twig',
            [
                'label' => 'Insert SQL for Country Data',
                'data' => $service->scrapeIso3166Countries()
            ]
        );
    }

    /**
     * @Route("/scrape/locality_csv_data/{iso3166NumericCode}", name="locality_csv_data")
     * @param string $iso3166NumericCode
     * @return Response
     * @throws \Exception
     */
    public function scrapeLocalityCSVData(string $iso3166NumericCode): Response
    {
        $service = new ScrapeCsvService();

        return $this->render(
            'scrape\basic_scrape.html.twig',
            [
                'label' => 'Insert SQL for Locality Data (' . $iso3166NumericCode . ')',
                'data' => $service->scrapeLocalityCsv(getcwd() . '\\' . Locality::LOCALITY_CSV_FILE_NAME, $iso3166NumericCode)
            ]
        );
    }
}
