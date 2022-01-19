<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\FunctionHelpers;
use GuzzleHttp\Client;

class FetchCoronaController extends Controller
{
    protected $client, $baseUrl;

    public function __construct(Request $request)
    {
        $this->client = new Client([
            'base_uri' => 'https://api.kawalcorona.com',
            'timeout' => 5,
            'connect_timeout' => 5
        ]);
    }

    public function dataIndonesi()
    {
        try {
            $getDatas = $this->client->request('GET', '/indonesia');

            $datas = json_decode($getDatas->getBody());

            if (empty($datas)) {
                return response()->json(
                    FunctionHelpers::resError('Data not found !'), 422);
            }

            return response()->json(
                FunctionHelpers::resOK($datas[0]), 200);
        } catch (Exception $e) {
            return response()->json(
                FunctionHelpers::resError($e->getMessage()), 500);
        }
    }

    public function dataIndonesiEmpty()
    {
        try {
            $datas = [
                array(
                    'name' => 'Indonesia',
                    'positif' => '4,272,421',
                    'sembuh' => '4,119,472',
                    'meninggal' => '144,174',
                    'dirawat' => '8,775'
                )
            ];

            return response()->json(
                FunctionHelpers::resOK($datas[0]), 200);
        } catch (Exception $e) {
            return response()->json(
                FunctionHelpers::resError($e->getMessage()), 500);
        }
    }

    public function dataProvinces()
    {
        try {
            $getDatas = $this->client->request('GET', '/indonesia/provinsi');

            $datas = json_decode($getDatas->getBody());

            if (empty($datas)) {
                return response()->json(
                    FunctionHelpers::resError('Data not found !'), 422);
            }

            return response()->json(
                FunctionHelpers::resOK($datas), 200);
        } catch (Exception $e) {
            return response()->json(
                FunctionHelpers::resError($e->getMessage()), 500);
        }
    }

    public function dataProvincesEmpty()
    {
        try {
            $datas = [
                array(
                    'attributes' => array(
                        'FID' => 11,
                        'Kode_Provi' => 31,
                        'Provinsi' => 'DKI Jakarta',
                        'Kasus_Posi' => number_format(1307, 0),
                        'Kasus_Semb' => number_format(622, 0),
                        'Kasus_Meni' => number_format(29, 0)
                    )
                ),
                array(
                    'attributes' => array(
                        'FID' => 12,
                        'Kode_Provi' => 32,
                        'Provinsi' => 'Jawa Barat',
                        'Kasus_Posi' => number_format(5307, 0),
                        'Kasus_Semb' => number_format(822, 0),
                        'Kasus_Meni' => number_format(29, 0)
                    )
                ),
                array(
                    'attributes' => array(
                        'FID' => 13,
                        'Kode_Provi' => 33,
                        'Provinsi' => 'Jawa Tengah',
                        'Kasus_Posi' => number_format(8307, 0),
                        'Kasus_Semb' => number_format(292, 0),
                        'Kasus_Meni' => number_format(29, 0)
                    )
                ),
                array(
                    'attributes' => array(
                        'FID' => 14,
                        'Kode_Provi' => 34,
                        'Provinsi' => 'Jawa Timur',
                        'Kasus_Posi' => number_format(2307, 0),
                        'Kasus_Semb' => number_format(322, 0),
                        'Kasus_Meni' => number_format(29, 0)
                    )
                ),
                array(
                    'attributes' => array(
                        'FID' => 15,
                        'Kode_Provi' => 35,
                        'Provinsi' => 'Kalimantan Timur',
                        'Kasus_Posi' => number_format(5307, 0),
                        'Kasus_Semb' => number_format(232, 0),
                        'Kasus_Meni' => number_format(229, 0)
                    )
                ),
                array(
                    'attributes' => array(
                        'FID' => 16,
                        'Kode_Provi' => 36,
                        'Provinsi' => 'Sulawesi Selatan',
                        'Kasus_Posi' => number_format(307, 0),
                        'Kasus_Semb' => number_format(22, 0),
                        'Kasus_Meni' => number_format(29, 0)
                    )
                ),
                array(
                    'attributes' => array(
                        'FID' => 17,
                        'Kode_Provi' => 37,
                        'Provinsi' => 'Banten',
                        'Kasus_Posi' => number_format(307, 0),
                        'Kasus_Semb' => number_format(22, 0),
                        'Kasus_Meni' => number_format(29, 0)
                    )
                ),
                array(
                    'attributes' => array(
                        'FID' => 18,
                        'Kode_Provi' => 38,
                        'Provinsi' => 'Bali',
                        'Kasus_Posi' => number_format(307, 0),
                        'Kasus_Semb' => number_format(22, 0),
                        'Kasus_Meni' => number_format(29, 0)
                    )
                ),
                array(
                    'attributes' => array(
                        'FID' => 19,
                        'Kode_Provi' => 39,
                        'Provinsi' => 'Riau',
                        'Kasus_Posi' => number_format(307, 0),
                        'Kasus_Semb' => number_format(22, 0),
                        'Kasus_Meni' => number_format(29, 0)
                    )
                ),
                array(
                    'attributes' => array(
                        'FID' => 20,
                        'Kode_Provi' => 40,
                        'Provinsi' => 'Daerah Istimewa Yogyakarta',
                        'Kasus_Posi' => number_format(307, 0),
                        'Kasus_Semb' => number_format(22, 0),
                        'Kasus_Meni' => number_format(29, 0)
                    )
                ),
                array(
                    'attributes' => array(
                        'FID' => 21,
                        'Kode_Provi' => 41,
                        'Provinsi' => 'Sumatra Barat',
                        'Kasus_Posi' => number_format(307, 0),
                        'Kasus_Semb' => number_format(22, 0),
                        'Kasus_Meni' => number_format(29, 0)
                    )
                ),
                array(
                    'attributes' => array(
                        'FID' => 22,
                        'Kode_Provi' => 42,
                        'Provinsi' => 'Kalimantan Selatan',
                        'Kasus_Posi' => number_format(307, 0),
                        'Kasus_Semb' => number_format(22, 0),
                        'Kasus_Meni' => number_format(29, 0)
                    )
                )
            ];

            return response()->json(
                FunctionHelpers::resOK($datas), 200);
        } catch (Exception $e) {
            return response()->json(
                FunctionHelpers::resError($e->getMessage()), 500);
        }
    }

    public function dataGlobal()
    {
        try {
            $getConfirmed = $this->client->request('GET', '/positif');
            $getDeaths = $this->client->request('GET', '/meninggal');
            $getRecovered = $this->client->request('GET', '/sembuh');

            $confirm = json_decode($getConfirmed->getBody());
            $death = json_decode($getDeaths->getBody());
            $recovery = json_decode($getRecovered->getBody());

            if (empty($confirm) || empty($death) || empty($recovery)) {
                return response()->json(
                    FunctionHelpers::resError('Data not found !'), 422);
            }

            $datas = [
                'sum_confirmed' => $confirm->value,
                'sum_death' => $death->value,
                'sum_recovery' => $recovery->value
            ];

            return response()->json(
                FunctionHelpers::resOK($datas), 200);
        } catch (Exception $e) {
            return response()->json(
                FunctionHelpers::resError($e->getMessage()), 500);
        }
    }

    public function dataGlobalEmpty()
    {
        try {
            $datas = [
                'sum_confirmed' => '4,312,312',
                'sum_death' => '4,00,333',
                'sum_recovery' => '4,124,122'
            ];

            return response()->json(
                FunctionHelpers::resOK($datas), 200);
        } catch (Exception $e) {
            return response()->json(
                FunctionHelpers::resError($e->getMessage()), 500);
        }
    }

    public function dataNations()
    {
        try {
            $getDatas = $this->client->request('GET', '/');

            $datas = json_decode($getDatas->getBody());

            if (empty($datas)) {
                return response()->json(
                    FunctionHelpers::resError('Data not found !'), 422);
            }

            foreach ($datas as $data) {
                if ($data->attributes->OBJECTID == 183) {
                    $datas[1] = $data;
                }

                if ($data->attributes->OBJECTID == 80) {
                    $datas[0] = $data;
                }
            }

            foreach ($datas as $key => $data) {
                $active = isset($data->attributes->Active) ? $data->attributes->Active : 0;
                $confirm = isset($data->attributes->Confirmed) ? $data->attributes->Confirmed : 0;
                $death = isset($data->attributes->Deaths) ? $data->attributes->Deaths : 0;
                $recovery = isset($data->attributes->Recovered) ? $data->attributes->Recovered : 0;
                $sum = $active + $confirm + $death + $recovery;

                $datas[$key]->attributes->Sum = $sum;
                $datas[$key]->attributes->Key = $key;
                $datas[$key]->attributes->Active = number_format($active, 0);
                $datas[$key]->attributes->ActivePercent = number_format(($active / $sum) * 100, 0);
                $datas[$key]->attributes->Confirmed = number_format($confirm, 0);
                $datas[$key]->attributes->ConfirmedPercent = number_format(($confirm / $sum) * 100, 0);
                $datas[$key]->attributes->Deaths = number_format($death, 0);
                $datas[$key]->attributes->DeathsPercent = number_format(($death / $sum) * 100, 0);
                $datas[$key]->attributes->Recovered = number_format($recovery, 0);
                $datas[$key]->attributes->RecoveredPercent = number_format(($recovery / $sum) * 100, 0);
            }

            return response()->json(
                FunctionHelpers::resOK($datas), 200);
        } catch (Exception $e) {
            return response()->json(
                FunctionHelpers::resError($e->getMessage()), 500);
        }
    }

    public function dataNationsEmpty()
    {
        try {
            $datas = [
                array(
                    'attributes' => array(
                        'OBJECTID' => 183,
                        'Country_Region' => "US",
                        'Last_Update' => 1642450866000,
                        'Lat' => 40,
                        'Long_' => -100,
                        'Confirmed' => number_format(66222243, 0),
                        'Deaths' => number_format(851586, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 80,
                        'Country_Region' => "India",
                        'Last_Update' => 1642450866000,
                        'Lat' => 20.593684,
                        'Long_' => 78.96288,
                        'Confirmed' => number_format(37380253, 0),
                        'Deaths' => number_format(486451, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 24,
                        'Country_Region' => "Brazil",
                        'Last_Update' => 1642450866000,
                        'Lat' => -14.235,
                        'Long_' => -51.9253,
                        'Confirmed' => number_format(23015128, 0),
                        'Deaths' => number_format(621327, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 187,
                        'Country_Region' => "United Kingdom",
                        'Last_Update' => 1642450866000,
                        'Lat' => 55,
                        'Long_' => -3,
                        'Confirmed' => number_format(15405401, 0),
                        'Deaths' => number_format(152571, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 63,
                        'Country_Region' => "France",
                        'Last_Update' => 1642450866000,
                        'Lat' => 46.2276,
                        'Long_' => 2.2137,
                        'Confirmed' => number_format(14288472, 0),
                        'Deaths' => number_format(127972, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 145,
                        'Country_Region' => "Russia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 61.524,
                        'Long_' => 105.3188,
                        'Confirmed' => number_format(10651867, 0),
                        'Deaths' => number_format(315495, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 182,
                        'Country_Region' => "Turkey",
                        'Last_Update' => 1642450866000,
                        'Lat' => 38.9637,
                        'Long_' => 35.2433,
                        'Confirmed' => number_format(10459094, 0),
                        'Deaths' => number_format(84758, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 86,
                        'Country_Region' => "Italy",
                        'Last_Update' => 1642450866000,
                        'Lat' => 41.8719,
                        'Long_' => 12.5674,
                        'Confirmed' => number_format(8790302, 0),
                        'Deaths' => number_format(141391, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 165,
                        'Country_Region' => "Spain",
                        'Last_Update' => 1642450866000,
                        'Lat' => 40.463667,
                        'Long_' => -3.74922,
                        'Confirmed' => number_format(8424503, 0),
                        'Deaths' => number_format(90993, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 67,
                        'Country_Region' => "Germany",
                        'Last_Update' => 1642450866000,
                        'Lat' => 51.165691,
                        'Long_' => 10.451526,
                        'Confirmed' => number_format(8045274, 0),
                        'Deaths' => number_format(115706, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 7,
                        'Country_Region' => "Argentina",
                        'Last_Update' => 1642450866000,
                        'Lat' => -38.4161,
                        'Long_' => -63.6167,
                        'Confirmed' => number_format(7094865, 0),
                        'Deaths' => number_format(118040, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 82,
                        'Country_Region' => "Iran",
                        'Last_Update' => 1642450866000,
                        'Lat' => 32.427908,
                        'Long_' => 53.688046,
                        'Confirmed' => number_format(6224196, 0),
                        'Deaths' => number_format(132095, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 38,
                        'Country_Region' => "Colombia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 4.5709,
                        'Long_' => -74.2973,
                        'Confirmed' => number_format(5543796, 0),
                        'Deaths' => number_format(130996, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 116,
                        'Country_Region' => "Mexico",
                        'Last_Update' => 1642450866000,
                        'Lat' => 23.6345,
                        'Long_' => -102.5528,
                        'Confirmed' => number_format(4368314, 0),
                        'Deaths' => number_format(301410, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 141,
                        'Country_Region' => "Poland",
                        'Last_Update' => 1642450866000,
                        'Lat' => 51.9194,
                        'Long_' => 19.1451,
                        'Confirmed' => number_format(4323482, 0),
                        'Deaths' => number_format(102309, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 81,
                        'Country_Region' => "Indonesia",
                        'Last_Update' => 1642450866000,
                        'Lat' => -0.7893,
                        'Long_' => 113.9213,
                        'Confirmed' => number_format(4272421, 0),
                        'Deaths' => number_format(144174, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 185,
                        'Country_Region' => "Ukraine",
                        'Last_Update' => 1642450866000,
                        'Lat' => 48.3794,
                        'Long_' => 31.1656,
                        'Confirmed' => number_format(3941923, 0),
                        'Deaths' => number_format(104856, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 126,
                        'Country_Region' => "Netherlands",
                        'Last_Update' => 1642450866000,
                        'Lat' => 52.3167,
                        'Long_' => 5.55,
                        'Confirmed' => number_format(3689011, 0),
                        'Deaths' => number_format(21645, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 163,
                        'Country_Region' => "South Africa",
                        'Last_Update' => 1642450866000,
                        'Lat' => -30.5595,
                        'Long_' => 22.9375,
                        'Confirmed' => number_format(3560921, 0),
                        'Deaths' => number_format(93451, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 140,
                        'Country_Region' => "Philippines",
                        'Last_Update' => 1642450866000,
                        'Lat' => 12.879721,
                        'Long_' => 121.774017,
                        'Confirmed' => number_format(3242374, 0),
                        'Deaths' => number_format(52929, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 109,
                        'Country_Region' => "Malaysia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 4.210484,
                        'Long_' => 101.975766,
                        'Confirmed' => number_format(2810689, 0),
                        'Deaths' => number_format(31808, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 33,
                        'Country_Region' => "Canada",
                        'Last_Update' => 1642450866000,
                        'Lat' => 60.001,
                        'Long_' => -95.001,
                        'Confirmed' => number_format(2785737, 0),
                        'Deaths' => number_format(31664, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 139,
                        'Country_Region' => "Peru",
                        'Last_Update' => 1642450866000,
                        'Lat' => -9.19,
                        'Long_' => -75.0152,
                        'Confirmed' => number_format(2606126, 0),
                        'Deaths' => number_format(203464, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 47,
                        'Country_Region' => "Czechia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 49.8175,
                        'Long_' => 15.473,
                        'Confirmed' => number_format(2603766, 0),
                        'Deaths' => number_format(36874, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 17,
                        'Country_Region' => "Belgium",
                        'Last_Update' => 1642450866000,
                        'Lat' => 50.8333,
                        'Long_' => 4.469936,
                        'Confirmed' => number_format(2410731, 0),
                        'Deaths' => number_format(28612, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 176,
                        'Country_Region' => "Thailand",
                        'Last_Update' => 1642450866000,
                        'Lat' => 15.870032,
                        'Long_' => 100.992541,
                        'Confirmed' => number_format(2308615, 0),
                        'Deaths' => number_format(21898, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 83,
                        'Country_Region' => "Iraq",
                        'Last_Update' => 1642450866000,
                        'Lat' => 33.223191,
                        'Long_' => 43.679291,
                        'Confirmed' => number_format(2118779, 0),
                        'Deaths' => number_format(24252, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 192,
                        'Country_Region' => "Vietnam",
                        'Last_Update' => 1642450866000,
                        'Lat' => 14.058324,
                        'Long_' => 108.277199,
                        'Confirmed' => number_format(2023546, 0),
                        'Deaths' => number_format(35609, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 144,
                        'Country_Region' => "Romania",
                        'Last_Update' => 1642450866000,
                        'Lat' => 45.9432,
                        'Long_' => 24.9668,
                        'Confirmed' => number_format(1911546, 0),
                        'Deaths' => number_format(59257, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 142,
                        'Country_Region' => "Portugal",
                        'Last_Update' => 1642450866000,
                        'Lat' => 39.3999,
                        'Long_' => -8.2245,
                        'Confirmed' => number_format(1906891, 0),
                        'Deaths' => number_format(19334, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 88,
                        'Country_Region' => "Japan",
                        'Last_Update' => 1642450866000,
                        'Lat' => 36.204824,
                        'Long_' => 138.252924,
                        'Confirmed' => number_format(1902304, 0),
                        'Deaths' => number_format(18433, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 36,
                        'Country_Region' => "Chile",
                        'Last_Update' => 1642450866000,
                        'Lat' => -35.6751,
                        'Long_' => -71.543,
                        'Confirmed' => number_format(1885540, 0),
                        'Deaths' => number_format(39426, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 85,
                        'Country_Region' => "Israel",
                        'Last_Update' => 1642450866000,
                        'Lat' => 31.046051,
                        'Long_' => 34.851612,
                        'Confirmed' => number_format(1792130, 0),
                        'Deaths' => number_format(8318, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 9,
                        'Country_Region' => "Australia",
                        'Last_Update' => 1642450866000,
                        'Lat' => -25,
                        'Long_' => 133,
                        'Confirmed' => number_format(1787361, 0),
                        'Deaths' => number_format(2692, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 171,
                        'Country_Region' => "Switzerland",
                        'Last_Update' => 1642450866000,
                        'Lat' => 46.8182,
                        'Long_' => 8.2275,
                        'Confirmed' => number_format(1734346, 0),
                        'Deaths' => number_format(12514, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 69,
                        'Country_Region' => "Greece",
                        'Last_Update' => 1642450866000,
                        'Lat' => 39.0742,
                        'Long_' => 21.8243,
                        'Confirmed' => number_format(1679705, 0),
                        'Deaths' => number_format(22087, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 14,
                        'Country_Region' => "Bangladesh",
                        'Last_Update' => 1642450866000,
                        'Lat' => 23.685,
                        'Long_' => 90.3563,
                        'Confirmed' => number_format(1624387, 0),
                        'Deaths' => number_format(28154, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 170,
                        'Country_Region' => "Sweden",
                        'Last_Update' => 1642450866000,
                        'Lat' => 60.1282,
                        'Long_' => 18.6435,
                        'Confirmed' => number_format(1560363, 0),
                        'Deaths' => number_format(15513, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 10,
                        'Country_Region' => "Austria",
                        'Last_Update' => 1642450866000,
                        'Lat' => 47.5162,
                        'Long_' => 14.5501,
                        'Confirmed' => number_format(1459306, 0),
                        'Deaths' => number_format(13922, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 155,
                        'Country_Region' => "Serbia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 44.0165,
                        'Long_' => 21.0059,
                        'Confirmed' => number_format(1449192, 0),
                        'Deaths' => number_format(13098, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 159,
                        'Country_Region' => "Slovakia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 48.669,
                        'Long_' => 19.699,
                        'Confirmed' => number_format(1419379, 0),
                        'Deaths' => number_format(17352, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 78,
                        'Country_Region' => "Hungary",
                        'Last_Update' => 1642450866000,
                        'Lat' => 47.1625,
                        'Long_' => 19.5033,
                        'Confirmed' => number_format(1348233, 0),
                        'Deaths' => number_format(40507, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 134,
                        'Country_Region' => "Pakistan",
                        'Last_Update' => 1642450866000,
                        'Lat' => 30.3753,
                        'Long_' => 69.3451,
                        'Confirmed' => number_format(1328487, 0),
                        'Deaths' => number_format(29019, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 48,
                        'Country_Region' => "Denmark",
                        'Last_Update' => 1642450866000,
                        'Lat' => 56.2639,
                        'Long_' => 9.5018,
                        'Confirmed' => number_format(1178441, 0),
                        'Deaths' => number_format(3523, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 90,
                        'Country_Region' => "Kazakhstan",
                        'Last_Update' => 1642450866000,
                        'Lat' => 48.0196,
                        'Long_' => 66.9237,
                        'Confirmed' => number_format(1146165, 0),
                        'Deaths' => number_format(18318, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 84,
                        'Country_Region' => "Ireland",
                        'Last_Update' => 1642450866000,
                        'Lat' => 53.1424,
                        'Long_' => -7.6921,
                        'Confirmed' => number_format(1109818, 0),
                        'Deaths' => number_format(6035, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 89,
                        'Country_Region' => "Jordan",
                        'Last_Update' => 1642450866000,
                        'Lat' => 31.24,
                        'Long_' => 36.51,
                        'Confirmed' => number_format(1106006, 0),
                        'Deaths' => number_format(13004, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 122,
                        'Country_Region' => "Morocco",
                        'Last_Update' => 1642450866000,
                        'Lat' => 31.7917,
                        'Long_' => -7.0926,
                        'Confirmed' => number_format(1051830, 0),
                        'Deaths' => number_format(14994, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 45,
                        'Country_Region' => "Cuba",
                        'Last_Update' => 1642450866000,
                        'Lat' => 21.521757,
                        'Long_' => -77.781167,
                        'Confirmed' => number_format(1002499, 0),
                        'Deaths' => number_format(8341, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 66,
                        'Country_Region' => "Georgia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 42.3154,
                        'Long_' => 43.3569,
                        'Confirmed' => number_format(999343, 0),
                        'Deaths' => number_format(14481, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 125,
                        'Country_Region' => "Nepal",
                        'Last_Update' => 1642450866000,
                        'Lat' => 28.1667,
                        'Long_' => 84.25,
                        'Confirmed' => number_format(859485, 0),
                        'Deaths' => number_format(11623, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 26,
                        'Country_Region' => "Bulgaria",
                        'Last_Update' => 1642450866000,
                        'Lat' => 42.7339,
                        'Long_' => 25.4858,
                        'Confirmed' => number_format(820608, 0),
                        'Deaths' => number_format(32086, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 99,
                        'Country_Region' => "Lebanon",
                        'Last_Update' => 1642450866000,
                        'Lat' => 33.8547,
                        'Long_' => 35.8623,
                        'Confirmed' => number_format(820170, 0),
                        'Deaths' => number_format(9383, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 44,
                        'Country_Region' => "Croatia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 45.1,
                        'Long_' => 15.2,
                        'Confirmed' => number_format(818832, 0),
                        'Deaths' => number_format(13157, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 186,
                        'Country_Region' => "United Arab Emirates",
                        'Last_Update' => 1642450866000,
                        'Lat' => 23.424076,
                        'Long_' => 53.847818,
                        'Confirmed' => number_format(808237, 0),
                        'Deaths' => number_format(2195, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 181,
                        'Country_Region' => "Tunisia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 33.886917,
                        'Long_' => 9.537499,
                        'Confirmed' => number_format(788012, 0),
                        'Deaths' => number_format(25803, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 21,
                        'Country_Region' => "Bolivia",
                        'Last_Update' => 1642450866000,
                        'Lat' => -16.2902,
                        'Long_' => -63.5887,
                        'Confirmed' => number_format(749070, 0),
                        'Deaths' => number_format(20238, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 16,
                        'Country_Region' => "Belarus",
                        'Last_Update' => 1642450866000,
                        'Lat' => 53.7098,
                        'Long_' => 27.9534,
                        'Confirmed' => number_format(717034, 0),
                        'Deaths' => number_format(5836, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 93,
                        'Country_Region' => "Korea, South",
                        'Last_Update' => 1642450866000,
                        'Lat' => 35.907757,
                        'Long_' => 127.766922,
                        'Confirmed' => number_format(696032, 0),
                        'Deaths' => number_format(6333, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 71,
                        'Country_Region' => "Guatemala",
                        'Last_Update' => 1642450866000,
                        'Lat' => 15.7835,
                        'Long_' => -90.2308,
                        'Confirmed' => number_format(653171, 0),
                        'Deaths' => number_format(16176, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 11,
                        'Country_Region' => "Azerbaijan",
                        'Last_Update' => 1642450866000,
                        'Lat' => 40.1431,
                        'Long_' => 47.5769,
                        'Confirmed' => number_format(626085, 0),
                        'Deaths' => number_format(8529, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 153,
                        'Country_Region' => "Saudi Arabia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 23.885942,
                        'Long_' => 45.079162,
                        'Confirmed' => number_format(620935, 0),
                        'Deaths' => number_format(8908, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 42,
                        'Country_Region' => "Costa Rica",
                        'Last_Update' => 1642450866000,
                        'Lat' => 9.7489,
                        'Long_' => -83.7534,
                        'Confirmed' => number_format(609882, 0),
                        'Deaths' => number_format(7406, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 53,
                        'Country_Region' => "Ecuador",
                        'Last_Update' => 1642450866000,
                        'Lat' => -1.8312,
                        'Long_' => -78.1834,
                        'Confirmed' => number_format(602942, 0),
                        'Deaths' => number_format(34206, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 166,
                        'Country_Region' => "Sri Lanka",
                        'Last_Update' => 1642450866000,
                        'Lat' => 7.873054,
                        'Long_' => 80.771797,
                        'Confirmed' => number_format(597035, 0),
                        'Deaths' => number_format(15218, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 136,
                        'Country_Region' => "Panama",
                        'Last_Update' => 1642450866000,
                        'Lat' => 8.538,
                        'Long_' => -80.7821,
                        'Confirmed' => number_format(574856, 0),
                        'Deaths' => number_format(7520, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 104,
                        'Country_Region' => "Lithuania",
                        'Last_Update' => 1642450866000,
                        'Lat' => 55.1694,
                        'Long_' => 23.8813,
                        'Confirmed' => number_format(570602, 0),
                        'Deaths' => number_format(7660, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 160,
                        'Country_Region' => "Slovenia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 46.1512,
                        'Long_' => 14.9955,
                        'Confirmed' => number_format(538325, 0),
                        'Deaths' => number_format(5705, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 28,
                        'Country_Region' => "Burma",
                        'Last_Update' => 1642450866000,
                        'Lat' => 21.9162,
                        'Long_' => 95.956,
                        'Confirmed' => number_format(533245, 0),
                        'Deaths' => number_format(19304, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 188,
                        'Country_Region' => "Uruguay",
                        'Last_Update' => 1642450866000,
                        'Lat' => -32.5228,
                        'Long_' => -55.7658,
                        'Confirmed' => number_format(512841, 0),
                        'Deaths' => number_format(6243, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 132,
                        'Country_Region' => "Norway",
                        'Last_Update' => 1642450866000,
                        'Lat' => 60.472,
                        'Long_' => 8.4689,
                        'Confirmed' => number_format(512393, 0),
                        'Deaths' => number_format(1381, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 52,
                        'Country_Region' => "Dominican Republic",
                        'Last_Update' => 1642450866000,
                        'Lat' => 18.7357,
                        'Long_' => -70.1627,
                        'Confirmed' => number_format(504914, 0),
                        'Deaths' => number_format(4269, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 138,
                        'Country_Region' => "Paraguay",
                        'Last_Update' => 1642450866000,
                        'Lat' => -23.4425,
                        'Long_' => -58.4438,
                        'Confirmed' => number_format(501189, 0),
                        'Deaths' => number_format(16821, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 193,
                        'Country_Region' => "West Bank and Gaza",
                        'Last_Update' => 1642450866000,
                        'Lat' => 31.9522,
                        'Long_' => 35.2332,
                        'Confirmed' => number_format(476328, 0),
                        'Deaths' => number_format(5019, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 95,
                        'Country_Region' => "Kuwait",
                        'Last_Update' => 1642450866000,
                        'Lat' => 29.31166,
                        'Long_' => 47.481766,
                        'Confirmed' => number_format(470478, 0),
                        'Deaths' => number_format(2477, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 60,
                        'Country_Region' => "Ethiopia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 9.145,
                        'Long_' => 40.4897,
                        'Confirmed' => number_format(458203, 0),
                        'Deaths' => number_format(7162, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 191,
                        'Country_Region' => "Venezuela",
                        'Last_Update' => 1642450866000,
                        'Lat' => 6.4238,
                        'Long_' => -66.5897,
                        'Confirmed' => number_format(455023, 0),
                        'Deaths' => number_format(5380, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 120,
                        'Country_Region' => "Mongolia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 46.8625,
                        'Long_' => 103.8467,
                        'Confirmed' => number_format(409215, 0),
                        'Deaths' => number_format(2086, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 54,
                        'Country_Region' => "Egypt",
                        'Last_Update' => 1642450866000,
                        'Lat' => 26.820553,
                        'Long_' => 30.802498,
                        'Confirmed' => number_format(400076, 0),
                        'Deaths' => number_format(22148, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 102,
                        'Country_Region' => "Libya",
                        'Last_Update' => 1642450866000,
                        'Lat' => 26.3351,
                        'Long_' => 17.228331,
                        'Confirmed' => number_format(398055, 0),
                        'Deaths' => number_format(5853, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 118,
                        'Country_Region' => "Moldova",
                        'Last_Update' => 1642450866000,
                        'Lat' => 47.4116,
                        'Long_' => 28.3699,
                        'Confirmed' => number_format(390742, 0),
                        'Deaths' => number_format(10452, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 77,
                        'Country_Region' => "Honduras",
                        'Last_Update' => 1642450866000,
                        'Lat' => 15.2,
                        'Long_' => -86.2419,
                        'Confirmed' => number_format(382440, 0),
                        'Deaths' => number_format(10449, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 62,
                        'Country_Region' => "Finland",
                        'Last_Update' => 1642450866000,
                        'Lat' => 61.9241,
                        'Long_' => 25.7482,
                        'Confirmed' => number_format(371135, 0),
                        'Deaths' => number_format(1724, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 8,
                        'Country_Region' => "Armenia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 40.0691,
                        'Long_' => 45.0382,
                        'Confirmed' => number_format(347785, 0),
                        'Deaths' => number_format(8020, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 91,
                        'Country_Region' => "Kenya",
                        'Last_Update' => 1642450866000,
                        'Lat' => -0.0236,
                        'Long_' => 37.9062,
                        'Confirmed' => number_format(317857, 0),
                        'Deaths' => number_format(5499, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 22,
                        'Country_Region' => "Bosnia and Herzegovina",
                        'Last_Update' => 1642450866000,
                        'Lat' => 43.9159,
                        'Long_' => 17.6791,
                        'Confirmed' => number_format(317692, 0),
                        'Deaths' => number_format(13841, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 133,
                        'Country_Region' => "Oman",
                        'Last_Update' => 1642450866000,
                        'Lat' => 21.512583,
                        'Long_' => 55.923255,
                        'Confirmed' => number_format(313538, 0),
                        'Deaths' => number_format(4122, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 13,
                        'Country_Region' => "Bahrain",
                        'Last_Update' => 1642450866000,
                        'Lat' => 26.0275,
                        'Long_' => 50.55,
                        'Confirmed' => number_format(308008, 0),
                        'Deaths' => number_format(1398, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 98,
                        'Country_Region' => "Latvia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 56.8796,
                        'Long_' => 24.6032,
                        'Confirmed' => number_format(305354, 0),
                        'Deaths' => number_format(4734, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 143,
                        'Country_Region' => "Qatar",
                        'Last_Update' => 1642450866000,
                        'Lat' => 25.3548,
                        'Long_' => 51.1839,
                        'Confirmed' => number_format(303240, 0),
                        'Deaths' => number_format(627, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 195,
                        'Country_Region' => "Zambia",
                        'Last_Update' => 1642450866000,
                        'Lat' => -13.133897,
                        'Long_' => 27.849332,
                        'Confirmed' => number_format(296817, 0),
                        'Deaths' => number_format(3866, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 158,
                        'Country_Region' => "Singapore",
                        'Last_Update' => 1642450866000,
                        'Lat' => 1.2833,
                        'Long_' => 103.8333,
                        'Confirmed' => number_format(293014, 0),
                        'Deaths' => number_format(843, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 58,
                        'Country_Region' => "Estonia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 58.5953,
                        'Long_' => 25.0136,
                        'Confirmed' => number_format(269199, 0),
                        'Deaths' => number_format(1984, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 130,
                        'Country_Region' => "Nigeria",
                        'Last_Update' => 1642450866000,
                        'Lat' => 9.082,
                        'Long_' => 8.6753,
                        'Confirmed' => number_format(250929, 0),
                        'Deaths' => number_format(3103, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 131,
                        'Country_Region' => "North Macedonia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 41.6086,
                        'Long_' => 21.7453,
                        'Confirmed' => number_format(245398, 0),
                        'Deaths' => number_format(8115, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 23,
                        'Country_Region' => "Botswana",
                        'Last_Update' => 1642450866000,
                        'Lat' => -22.3285,
                        'Long_' => 24.6849,
                        'Confirmed' => number_format(237678, 0),
                        'Deaths' => number_format(2514, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 2,
                        'Country_Region' => "Albania",
                        'Last_Update' => 1642450866000,
                        'Lat' => 41.1533,
                        'Long_' => 20.1683,
                        'Confirmed' => number_format(233654, 0),
                        'Deaths' => number_format(3271, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 46,
                        'Country_Region' => "Cyprus",
                        'Last_Update' => 1642450866000,
                        'Lat' => 35.1264,
                        'Long_' => 33.4299,
                        'Confirmed' => number_format(228881, 0),
                        'Deaths' => number_format(684, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 196,
                        'Country_Region' => "Zimbabwe",
                        'Last_Update' => 1642450866000,
                        'Lat' => -19.015438,
                        'Long_' => 29.154857,
                        'Confirmed' => number_format(226078, 0),
                        'Deaths' => number_format(5247, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 3,
                        'Country_Region' => "Algeria",
                        'Last_Update' => 1642450866000,
                        'Lat' => 28.0339,
                        'Long_' => 1.6596,
                        'Confirmed' => number_format(226057, 0),
                        'Deaths' => number_format(6412, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 123,
                        'Country_Region' => "Mozambique",
                        'Last_Update' => 1642450866000,
                        'Lat' => -18.665695,
                        'Long_' => 35.529562,
                        'Confirmed' => number_format(219081, 0),
                        'Deaths' => number_format(2127, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 189,
                        'Country_Region' => "Uzbekistan",
                        'Last_Update' => 1642450866000,
                        'Lat' => 41.377491,
                        'Long_' => 64.585262,
                        'Confirmed' => number_format(206122, 0),
                        'Deaths' => number_format(1518, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 121,
                        'Country_Region' => "Montenegro",
                        'Last_Update' => 1642450866000,
                        'Lat' => 42.708678,
                        'Long_' => 19.37439,
                        'Confirmed' => number_format(204862, 0),
                        'Deaths' => number_format(2479, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 96,
                        'Country_Region' => "Kyrgyzstan",
                        'Last_Update' => 1642450866000,
                        'Lat' => 41.20438,
                        'Long_' => 74.766098,
                        'Confirmed' => number_format(190468, 0),
                        'Deaths' => number_format(2833, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 94,
                        'Country_Region' => "Kosovo",
                        'Last_Update' => 1642450866000,
                        'Lat' => 42.602636,
                        'Long_' => 20.902977,
                        'Confirmed' => number_format(166862, 0),
                        'Deaths' => number_format(2994, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 1,
                        'Country_Region' => "Afghanistan",
                        'Last_Update' => 1642450866000,
                        'Lat' => 33.93911,
                        'Long_' => 67.709953,
                        'Confirmed' => number_format(158826, 0),
                        'Deaths' => number_format(7381, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 184,
                        'Country_Region' => "Uganda",
                        'Last_Update' => 1642450866000,
                        'Lat' => 1.373333,
                        'Long_' => 32.290275,
                        'Confirmed' => number_format(158743, 0),
                        'Deaths' => number_format(3424, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 124,
                        'Country_Region' => "Namibia",
                        'Last_Update' => 1642450866000,
                        'Lat' => -22.9576,
                        'Long_' => 18.4904,
                        'Confirmed' => number_format(154536, 0),
                        'Deaths' => number_format(3823, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 68,
                        'Country_Region' => "Ghana",
                        'Last_Update' => 1642450866000,
                        'Lat' => 7.9465,
                        'Long_' => -1.0232,
                        'Confirmed' => number_format(153514, 0),
                        'Deaths' => number_format(1343, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 105,
                        'Country_Region' => "Luxembourg",
                        'Last_Update' => 1642450866000,
                        'Lat' => 49.8153,
                        'Long_' => 6.1296,
                        'Confirmed' => number_format(127765, 0),
                        'Deaths' => number_format(938, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 97,
                        'Country_Region' => "Laos",
                        'Last_Update' => 1642450866000,
                        'Lat' => 19.85627,
                        'Long_' => 102.495496,
                        'Confirmed' => number_format(125333, 0),
                        'Deaths' => number_format(497, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 146,
                        'Country_Region' => "Rwanda",
                        'Last_Update' => 1642450866000,
                        'Lat' => -1.9403,
                        'Long_' => 29.8739,
                        'Confirmed' => number_format(125166, 0),
                        'Deaths' => number_format(1408, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 55,
                        'Country_Region' => "El Salvador",
                        'Last_Update' => 1642450866000,
                        'Lat' => 13.7942,
                        'Long_' => -88.8965,
                        'Confirmed' => number_format(123577, 0),
                        'Deaths' => number_format(3834, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 31,
                        'Country_Region' => "Cambodia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 11.55,
                        'Long_' => 104.9167,
                        'Confirmed' => number_format(120825, 0),
                        'Deaths' => number_format(3015, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 37,
                        'Country_Region' => "China",
                        'Last_Update' => 1642450866000,
                        'Lat' => 30.5928,
                        'Long_' => 114.3055,
                        'Confirmed' => number_format(118030, 0),
                        'Deaths' => number_format(4849, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 87,
                        'Country_Region' => "Jamaica",
                        'Last_Update' => 1642450866000,
                        'Lat' => 18.1096,
                        'Long_' => -77.2975,
                        'Confirmed' => number_format(113438, 0),
                        'Deaths' => number_format(2536, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 32,
                        'Country_Region' => "Cameroon",
                        'Last_Update' => 1642450866000,
                        'Lat' => 3.848,
                        'Long_' => 11.5021,
                        'Confirmed' => number_format(109666, 0),
                        'Deaths' => number_format(1853, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 110,
                        'Country_Region' => "Maldives",
                        'Last_Update' => 1642450866000,
                        'Lat' => 3.2028,
                        'Long_' => 73.2207,
                        'Confirmed' => number_format(105001, 0),
                        'Deaths' => number_format(265, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 180,
                        'Country_Region' => "Trinidad and Tobago",
                        'Last_Update' => 1642450866000,
                        'Lat' => 10.6918,
                        'Long_' => -61.2225,
                        'Confirmed' => number_format(100994, 0),
                        'Deaths' => number_format(3197, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 5,
                        'Country_Region' => "Angola",
                        'Last_Update' => 1642450866000,
                        'Lat' => -11.2027,
                        'Long_' => 17.8739,
                        'Confirmed' => number_format(93694, 0),
                        'Deaths' => number_format(1863, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 154,
                        'Country_Region' => "Senegal",
                        'Last_Update' => 1642450866000,
                        'Lat' => 14.4974,
                        'Long_' => -14.4524,
                        'Confirmed' => number_format(82986, 0),
                        'Deaths' => number_format(1909, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 41,
                        'Country_Region' => "Congo (Kinshasa)",
                        'Last_Update' => 1642450866000,
                        'Lat' => -4.0383,
                        'Long_' => 21.7587,
                        'Confirmed' => number_format(82984, 0),
                        'Deaths' => number_format(1278, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 108,
                        'Country_Region' => "Malawi",
                        'Last_Update' => 1642450866000,
                        'Lat' => -13.2543,
                        'Long_' => 34.3015,
                        'Confirmed' => number_format(82719, 0),
                        'Deaths' => number_format(2466, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 43,
                        'Country_Region' => "Cote d'Ivoire",
                        'Last_Update' => 1642450866000,
                        'Lat' => 7.54,
                        'Long_' => -5.5471,
                        'Confirmed' => number_format(79088, 0),
                        'Deaths' => number_format(753, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 59,
                        'Country_Region' => "Eswatini",
                        'Last_Update' => 1642450866000,
                        'Lat' => -26.5225,
                        'Long_' => 31.4659,
                        'Confirmed' => number_format(67878, 0),
                        'Deaths' => number_format(1363, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 112,
                        'Country_Region' => "Malta",
                        'Last_Update' => 1642450866000,
                        'Lat' => 35.9375,
                        'Long_' => 14.3754,
                        'Confirmed' => number_format(63998, 0),
                        'Deaths' => number_format(506, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 169,
                        'Country_Region' => "Suriname",
                        'Last_Update' => 1642450866000,
                        'Lat' => 3.9193,
                        'Long_' => -56.0278,
                        'Confirmed' => number_format(63878, 0),
                        'Deaths' => number_format(1213, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 61,
                        'Country_Region' => "Fiji",
                        'Last_Update' => 1642450866000,
                        'Lat' => -17.7134,
                        'Long_' => 178.065,
                        'Confirmed' => number_format(59785, 0),
                        'Deaths' => number_format(746, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 107,
                        'Country_Region' => "Madagascar",
                        'Last_Update' => 1642450866000,
                        'Lat' => -18.766947,
                        'Long_' => 46.869107,
                        'Confirmed' => number_format(55827, 0),
                        'Deaths' => number_format(1169, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 114,
                        'Country_Region' => "Mauritania",
                        'Last_Update' => 1642450866000,
                        'Lat' => 21.0079,
                        'Long_' => -10.9408,
                        'Confirmed' => number_format(54991, 0),
                        'Deaths' => number_format(908, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 30,
                        'Country_Region' => "Cabo Verde",
                        'Last_Update' => 1642450866000,
                        'Lat' => 16.5388,
                        'Long_' => -23.0418,
                        'Confirmed' => number_format(54367, 0),
                        'Deaths' => number_format(376, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 167,
                        'Country_Region' => "Sudan",
                        'Last_Update' => 1642450866000,
                        'Lat' => 12.8628,
                        'Long_' => 30.2176,
                        'Confirmed' => number_format(51802, 0),
                        'Deaths' => number_format(3388, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 74,
                        'Country_Region' => "Guyana",
                        'Last_Update' => 1642450866000,
                        'Lat' => 4.860416,
                        'Long_' => -58.93018,
                        'Confirmed' => number_format(51203, 0),
                        'Deaths' => number_format(1095, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 172,
                        'Country_Region' => "Syria",
                        'Last_Update' => 1642450866000,
                        'Lat' => 34.802075,
                        'Long_' => 38.996815,
                        'Confirmed' => number_format(50710, 0),
                        'Deaths' => number_format(2947, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 79,
                        'Country_Region' => "Iceland",
                        'Last_Update' => 1642450866000,
                        'Lat' => 64.9631,
                        'Long_' => -19.0208,
                        'Confirmed' => number_format(48482, 0),
                        'Deaths' => number_format(44, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 64,
                        'Country_Region' => "Gabon",
                        'Last_Update' => 1642450866000,
                        'Lat' => -0.8037,
                        'Long_' => 11.6094,
                        'Confirmed' => number_format(45152, 0),
                        'Deaths' => number_format(297, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 18,
                        'Country_Region' => "Belize",
                        'Last_Update' => 1642450866000,
                        'Lat' => 17.1899,
                        'Long_' => -88.4976,
                        'Confirmed' => number_format(40612, 0),
                        'Deaths' => number_format(608, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 29,
                        'Country_Region' => "Burundi",
                        'Last_Update' => 1642450866000,
                        'Lat' => -3.3731,
                        'Long_' => 29.9189,
                        'Confirmed' => number_format(36654, 0),
                        'Deaths' => number_format(38, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 137,
                        'Country_Region' => "Papua New Guinea",
                        'Last_Update' => 1642450866000,
                        'Lat' => -6.314993,
                        'Long_' => 143.95555,
                        'Confirmed' => number_format(36446, 0),
                        'Deaths' => number_format(596, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 178,
                        'Country_Region' => "Togo",
                        'Last_Update' => 1642450866000,
                        'Lat' => 8.6195,
                        'Long_' => 0.8248,
                        'Confirmed' => number_format(35950, 0),
                        'Deaths' => number_format(261, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 15,
                        'Country_Region' => "Barbados",
                        'Last_Update' => 1642450866000,
                        'Lat' => 13.1939,
                        'Long_' => -59.5432,
                        'Confirmed' => number_format(35373, 0),
                        'Deaths' => number_format(269, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 72,
                        'Country_Region' => "Guinea",
                        'Last_Update' => 1642450866000,
                        'Lat' => 9.9456,
                        'Long_' => -9.6966,
                        'Confirmed' => number_format(35202, 0),
                        'Deaths' => number_format(406, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 156,
                        'Country_Region' => "Seychelles",
                        'Last_Update' => 1642450866000,
                        'Lat' => -4.6796,
                        'Long_' => 55.492,
                        'Confirmed' => number_format(32194, 0),
                        'Deaths' => number_format(136, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 100,
                        'Country_Region' => "Lesotho",
                        'Last_Update' => 1642450866000,
                        'Lat' => -29.61,
                        'Long_' => 28.2336,
                        'Confirmed' => number_format(31734, 0),
                        'Deaths' => number_format(687, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 175,
                        'Country_Region' => "Tanzania",
                        'Last_Update' => 1642450866000,
                        'Lat' => -6.369028,
                        'Long_' => 34.888822,
                        'Confirmed' => number_format(31395, 0),
                        'Deaths' => number_format(745, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 12,
                        'Country_Region' => "Bahamas",
                        'Last_Update' => 1642450866000,
                        'Lat' => 25.025885,
                        'Long_' => -78.035889,
                        'Confirmed' => number_format(30850, 0),
                        'Deaths' => number_format(719, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 4,
                        'Country_Region' => "Andorra",
                        'Last_Update' => 1642450866000,
                        'Lat' => 42.5063,
                        'Long_' => 1.5218,
                        'Confirmed' => number_format(29888, 0),
                        'Deaths' => number_format(142, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 111,
                        'Country_Region' => "Mali",
                        'Last_Update' => 1642450866000,
                        'Lat' => 17.570692,
                        'Long_' => -3.996166,
                        'Confirmed' => number_format(28586, 0),
                        'Deaths' => number_format(691, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 75,
                        'Country_Region' => "Haiti",
                        'Last_Update' => 1642450866000,
                        'Lat' => 18.9712,
                        'Long_' => -72.2852,
                        'Confirmed' => number_format(27082, 0),
                        'Deaths' => number_format(780, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 19,
                        'Country_Region' => "Benin",
                        'Last_Update' => 1642450866000,
                        'Lat' => 9.3077,
                        'Long_' => 2.3158,
                        'Confirmed' => number_format(26036, 0),
                        'Deaths' => number_format(162, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 162,
                        'Country_Region' => "Somalia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 5.152149,
                        'Long_' => 46.199616,
                        'Confirmed' => number_format(24261, 0),
                        'Deaths' => number_format(1335, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 40,
                        'Country_Region' => "Congo (Brazzaville)",
                        'Last_Update' => 1642450866000,
                        'Lat' => -0.228,
                        'Long_' => 15.8277,
                        'Confirmed' => number_format(23244, 0),
                        'Deaths' => number_format(371, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 115,
                        'Country_Region' => "Mauritius",
                        'Last_Update' => 1642450866000,
                        'Lat' => -20.348404,
                        'Long_' => 57.552152,
                        'Confirmed' => number_format(22586, 0),
                        'Deaths' => number_format(240, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 27,
                        'Country_Region' => "Burkina Faso",
                        'Last_Update' => 1642450866000,
                        'Lat' => 12.2383,
                        'Long_' => -1.5616,
                        'Confirmed' => number_format(20195, 0),
                        'Deaths' => number_format(339, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 177,
                        'Country_Region' => "Timor-Leste",
                        'Last_Update' => 1642450866000,
                        'Lat' => -8.874217,
                        'Long_' => 125.727539,
                        'Confirmed' => number_format(19863, 0),
                        'Deaths' => number_format(122, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 173,
                        'Country_Region' => "Taiwan*",
                        'Last_Update' => 1642450866000,
                        'Lat' => 23.7,
                        'Long_' => 121,
                        'Confirmed' => number_format(17885, 0),
                        'Deaths' => number_format(851, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 128,
                        'Country_Region' => "Nicaragua",
                        'Last_Update' => 1642450866000,
                        'Lat' => 12.865416,
                        'Long_' => -85.207229,
                        'Confirmed' => number_format(17563, 0),
                        'Deaths' => number_format(218, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 148,
                        'Country_Region' => "Saint Lucia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 13.9094,
                        'Long_' => -60.9789,
                        'Confirmed' => number_format(17531, 0),
                        'Deaths' => number_format(314, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 174,
                        'Country_Region' => "Tajikistan",
                        'Last_Update' => 1642450866000,
                        'Lat' => 38.861,
                        'Long_' => 71.2761,
                        'Confirmed' => number_format(17493, 0),
                        'Deaths' => number_format(125, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 164,
                        'Country_Region' => "South Sudan",
                        'Last_Update' => 1642450866000,
                        'Lat' => 6.877,
                        'Long_' => 31.307,
                        'Confirmed' => number_format(16533, 0),
                        'Deaths' => number_format(136, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 25,
                        'Country_Region' => "Brunei",
                        'Last_Update' => 1642450866000,
                        'Lat' => 4.5353,
                        'Long_' => 114.7277,
                        'Confirmed' => number_format(15881, 0),
                        'Deaths' => number_format(98, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 56,
                        'Country_Region' => "Equatorial Guinea",
                        'Last_Update' => 1642450866000,
                        'Lat' => 1.6508,
                        'Long_' => 10.2679,
                        'Confirmed' => number_format(15319, 0),
                        'Deaths' => number_format(178, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 127,
                        'Country_Region' => "New Zealand",
                        'Last_Update' => 1642450866000,
                        'Lat' => -40.9006,
                        'Long_' => 174.886,
                        'Confirmed' => number_format(15129, 0),
                        'Deaths' => number_format(52, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 50,
                        'Country_Region' => "Djibouti",
                        'Last_Update' => 1642450866000,
                        'Lat' => 11.8251,
                        'Long_' => 42.5903,
                        'Confirmed' => number_format(14984, 0),
                        'Deaths' => number_format(189, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 34,
                        'Country_Region' => "Central African Republic",
                        'Last_Update' => 1642450866000,
                        'Lat' => 6.6111,
                        'Long_' => 20.9394,
                        'Confirmed' => number_format(13319, 0),
                        'Deaths' => number_format(108, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 65,
                        'Country_Region' => "Gambia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 13.4432,
                        'Long_' => -15.3101,
                        'Confirmed' => number_format(11572, 0),
                        'Deaths' => number_format(347, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 151,
                        'Country_Region' => "San Marino",
                        'Last_Update' => 1642450866000,
                        'Lat' => 43.9424,
                        'Long_' => 12.4578,
                        'Confirmed' => number_format(10641, 0),
                        'Deaths' => number_format(103, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 194,
                        'Country_Region' => "Yemen",
                        'Last_Update' => 1642450866000,
                        'Lat' => 15.552727,
                        'Long_' => 48.516388,
                        'Confirmed' => number_format(10352, 0),
                        'Deaths' => number_format(1991, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 70,
                        'Country_Region' => "Grenada",
                        'Last_Update' => 1642450866000,
                        'Lat' => 12.1165,
                        'Long_' => -61.679,
                        'Confirmed' => number_format(9701, 0),
                        'Deaths' => number_format(203, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 57,
                        'Country_Region' => "Eritrea",
                        'Last_Update' => 1642450866000,
                        'Lat' => 15.1794,
                        'Long_' => 39.7823,
                        'Confirmed' => number_format(9002, 0),
                        'Deaths' => number_format(88, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 129,
                        'Country_Region' => "Niger",
                        'Last_Update' => 1642450866000,
                        'Lat' => 17.607789,
                        'Long_' => 8.081666,
                        'Confirmed' => number_format(8386, 0),
                        'Deaths' => number_format(292, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 51,
                        'Country_Region' => "Dominica",
                        'Last_Update' => 1642450866000,
                        'Lat' => 15.415,
                        'Long_' => -61.371,
                        'Confirmed' => number_format(7957, 0),
                        'Deaths' => number_format(48, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 39,
                        'Country_Region' => "Comoros",
                        'Last_Update' => 1642450866000,
                        'Lat' => -11.6455,
                        'Long_' => 43.3333,
                        'Confirmed' => number_format(7767, 0),
                        'Deaths' => number_format(159, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 157,
                        'Country_Region' => "Sierra Leone",
                        'Last_Update' => 1642450866000,
                        'Lat' => 8.460555,
                        'Long_' => -11.779889,
                        'Confirmed' => number_format(7544, 0),
                        'Deaths' => number_format(125, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 103,
                        'Country_Region' => "Liechtenstein",
                        'Last_Update' => 1642450866000,
                        'Lat' => 47.14,
                        'Long_' => 9.55,
                        'Confirmed' => number_format(7265, 0),
                        'Deaths' => number_format(73, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 101,
                        'Country_Region' => "Liberia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 6.428055,
                        'Long_' => -9.429499,
                        'Confirmed' => number_format(7121, 0),
                        'Deaths' => number_format(287, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 73,
                        'Country_Region' => "Guinea-Bissau",
                        'Last_Update' => 1642450866000,
                        'Lat' => 11.8037,
                        'Long_' => -15.1804,
                        'Confirmed' => number_format(7034, 0),
                        'Deaths' => number_format(152, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 119,
                        'Country_Region' => "Monaco",
                        'Last_Update' => 1642450866000,
                        'Lat' => 43.7333,
                        'Long_' => 7.4167,
                        'Confirmed' => number_format(6837, 0),
                        'Deaths' => number_format(44, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 149,
                        'Country_Region' => "Saint Vincent and the Grenadines",
                        'Last_Update' => 1642450866000,
                        'Lat' => 12.9843,
                        'Long_' => -61.2872,
                        'Confirmed' => number_format(6581, 0),
                        'Deaths' => number_format(85, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 35,
                        'Country_Region' => "Chad",
                        'Last_Update' => 1642450866000,
                        'Lat' => 15.4542,
                        'Long_' => 18.7322,
                        'Confirmed' => number_format(6558, 0),
                        'Deaths' => number_format(185, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 152,
                        'Country_Region' => "Sao Tome and Principe",
                        'Last_Update' => 1642450866000,
                        'Lat' => 0.1864,
                        'Long_' => 6.6131,
                        'Confirmed' => number_format(5569, 0),
                        'Deaths' => number_format(66, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 6,
                        'Country_Region' => "Antigua and Barbuda",
                        'Last_Update' => 1642450866000,
                        'Lat' => 17.0608,
                        'Long_' => -61.7964,
                        'Confirmed' => number_format(5321, 0),
                        'Deaths' => number_format(120, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 147,
                        'Country_Region' => "Saint Kitts and Nevis",
                        'Last_Update' => 1642450866000,
                        'Lat' => 17.357822,
                        'Long_' => -62.782998,
                        'Confirmed' => number_format(4933, 0),
                        'Deaths' => number_format(28, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 20,
                        'Country_Region' => "Bhutan",
                        'Last_Update' => 1642450866000,
                        'Lat' => 27.5142,
                        'Long_' => 90.4336,
                        'Confirmed' => number_format(3069, 0),
                        'Deaths' => number_format(3, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 168,
                        'Country_Region' => "Summer Olympics 2020",
                        'Last_Update' => 1642450866000,
                        'Lat' => 35.6491,
                        'Long_' => 139.7737,
                        'Confirmed' => number_format(865, 0),
                        'Deaths' => number_format(0, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 49,
                        'Country_Region' => "Diamond Princess",
                        'Last_Update' => 1642450866000,
                        'Lat' => 0,
                        'Long_' => 0,
                        'Confirmed' => number_format(712, 0),
                        'Deaths' => number_format(13, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 76,
                        'Country_Region' => "Holy See",
                        'Last_Update' => 1642450866000,
                        'Lat' => 41.9029,
                        'Long_' => 12.4534,
                        'Confirmed' => number_format(27, 0),
                        'Deaths' => number_format(0, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 161,
                        'Country_Region' => "Solomon Islands",
                        'Last_Update' => 1642450866000,
                        'Lat' => -9.6457,
                        'Long_' => 160.1562,
                        'Confirmed' => number_format(25, 0),
                        'Deaths' => number_format(0, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 106,
                        'Country_Region' => "MS Zaandam",
                        'Last_Update' => 1642450866000,
                        'Lat' => 0,
                        'Long_' => 0,
                        'Confirmed' => number_format(9, 0),
                        'Deaths' => number_format(2, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 135,
                        'Country_Region' => "Palau",
                        'Last_Update' => 1642450866000,
                        'Lat' => 7.515,
                        'Long_' => 134.5825,
                        'Confirmed' => number_format(8, 0),
                        'Deaths' => number_format(0, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 113,
                        'Country_Region' => "Marshall Islands",
                        'Last_Update' => 1642450866000,
                        'Lat' => 7.1315,
                        'Long_' => 171.1845,
                        'Confirmed' => number_format(7, 0),
                        'Deaths' => number_format(0, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 190,
                        'Country_Region' => "Vanuatu",
                        'Last_Update' => 1642450866000,
                        'Lat' => -15.3767,
                        'Long_' => 166.9592,
                        'Confirmed' => number_format(7, 0),
                        'Deaths' => number_format(1, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 150,
                        'Country_Region' => "Samoa",
                        'Last_Update' => 1642450866000,
                        'Lat' => -13.759,
                        'Long_' => -172.1046,
                        'Confirmed' => number_format(3, 0),
                        'Deaths' => number_format(0, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 92,
                        'Country_Region' => "Kiribati",
                        'Last_Update' => 1642450866000,
                        'Lat' => -3.3704,
                        'Long_' => -168.734,
                        'Confirmed' => number_format(2, 0),
                        'Deaths' => number_format(0, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 117,
                        'Country_Region' => "Micronesia",
                        'Last_Update' => 1642450866000,
                        'Lat' => 7.4256,
                        'Long_' => 150.5508,
                        'Confirmed' => number_format(1, 0),
                        'Deaths' => number_format(0, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                ),
                array(
                    'attributes' => array(
                        'OBJECTID' => 179,
                        'Country_Region' => "Tonga",
                        'Last_Update' => 1642450866000,
                        'Lat' => -21.179,
                        'Long_' => -175.1982,
                        'Confirmed' => number_format(1, 0),
                        'Deaths' => number_format(0, 0),
                        'Recovered' => 0,
                        'Active' => 0
                    )
                )
            ];

            return response()->json(
                FunctionHelpers::resOK($datas), 200);
        } catch (Exception $e) {
            return response()->json(
                FunctionHelpers::resError($e->getMessage()), 500);
        }
    }
}
