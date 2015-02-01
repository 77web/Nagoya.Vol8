<?php

namespace Nagoya\Vol8;

use Nagoya\Vol8\Entity\Factory\PointFactory;
use Nagoya\Vol8\Util\InputParser;

class AppTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $input
     * @param int $expected
     * @dataProvider provideTestData
     */
    public function test($input, $expected)
    {
        $app = new App(new InputParser(), new MapBuilder(new PointFactory()), new Router());
        $actual = $app->run($input);

        $this->assertEquals($expected, $actual);
    }

    public function provideTestData()
    {
        return [
            /*0*/ ['01224/82925/69076/32298/21065', 6],
            /*1*/ ['03478/12569/03478/12569/03478', 10],
            /*2*/ ['09900/28127/87036/76545/87650', 10],
            /*3*/ ['77777/77777/77777/77777/77777', 1],
            /*4*/ ['00000/11111/22222/33333/44444', 5],
            /*5*/ ['01234/12345/23456/34567/45678', 9],
            /*6*/ ['10135/21245/43456/55567/77789', 8],
            /*7*/ ['33333/33333/55555/55555/77777', 2],
            /*8*/ ['01234/11234/22234/33334/44444', 5],
            /*9*/ ['98765/88765/77765/66665/55555', 5],
            /*10*/ ['01234/10325/23016/32107/45670', 8],
            /*11*/ ['34343/43434/34343/43434/34343', 2],
            /*12*/ ['14714/41177/71141/17414/47141', 3],
            /*13*/ ['13891/31983/89138/98319/13891', 4],
            /*14*/ ['01369/36901/90136/13690/69013', 5],
            /*15*/ ['02468/24689/46898/68986/89864', 6],
            /*16*/ ['86420/68642/46864/24686/02468', 5],
            /*17*/ ['77777/75557/75357/75557/77777', 3],
            /*18*/ ['53135/33133/11111/33133/53135', 3],
            /*19*/ ['01356/23501/45024/61246/13461', 5],
            /*20*/ ['46803/68025/91358/34792/78136', 4],
            /*21*/ ['66788/56789/55799/43210/33211', 9],
            /*22*/ ['40000/94321/96433/97644/98654', 9],
            /*23*/ ['58950/01769/24524/24779/17069', 6],
            /*24*/ ['97691/01883/98736/51934/81403', 4],
            /*25*/ ['92049/27798/69377/45936/80277', 5],
            /*26*/ ['97308/77113/08645/62578/44774', 5],
            /*27*/ ['90207/17984/01982/31272/60926', 6],
            /*28*/ ['62770/65146/06512/15407/89570', 4],
            /*29*/ ['93914/46889/27554/58581/18703', 5],
            /*30*/ ['42035/12430/60728/30842/90381', 5],
            /*31*/ ['90347/53880/67954/95256/68777', 6],
            /*32*/ ['05986/60473/01606/16425/46292', 5],
            /*33*/ ['18053/90486/24320/04250/03853', 5],
            /*34*/ ['36865/13263/67280/18600/12774', 5],
            /*35*/ ['72456/72052/79971/14656/41151', 5],
            /*36*/ ['94888/28649/05561/76571/97567', 5],
            /*37*/ ['50214/94693/88718/78922/55359', 5],
            /*38*/ ['76502/99325/17987/31737/93874', 7],
            /*39*/ ['87142/14764/13014/00248/73105', 6],
            /*40*/ ['24573/71679/48704/19786/91834', 7],
            /*41*/ ['20347/61889/06074/61263/20519', 7],
            /*42*/ ['74344/97459/97302/14439/35689', 6],
            /*43*/ ['04794/52198/50294/09340/24160', 5],
            /*44*/ ['41065/69344/64698/54167/43348', 7],
            /*45*/ ['39947/15696/03482/19574/70235', 7],
            /*46*/ ['92767/16790/84897/69765/75734', 7],
            /*47*/ ['09654/79610/05070/23456/74687', 8],
            /*48*/ ['73998/98799/98707/05633/23915', 8],
            /*49*/ ['35661/17480/89723/64335/27217', 7],
            /*50*/ ['02489/77571/84873/03879/84460', 7],
        ];
    }
}
