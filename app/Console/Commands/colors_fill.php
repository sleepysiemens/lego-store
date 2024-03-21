<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Color;

class colors_fill extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:colors_fill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach (Color::all() as $item)
        $item->delete();

        $data=
            [
                [
                    'title'=>'White',
                    'bl_num'=>1,
                    'hex'=>'#fff'
                ],
                [
                    'title'=>'Tan',
                    'bl_num'=>2,
                    'hex'=>'#eed9a4'
                ],
                [
                    'title'=>'Yellow',
                    'bl_num'=>3,
                    'hex'=>'#ffe001'
                ],
                [
                    'title'=>'Orange',
                    'bl_num'=>4,
                    'hex'=>'#ff7e14'
                ],
                [
                    'title'=>'Red',
                    'bl_num'=>5,
                    'hex'=>'#b30006'
                ],
                [
                    'title'=>'Green',
                    'bl_num'=>6,
                    'hex'=>'#00923d'
                ],
                [
                    'title'=>'Blue',
                    'bl_num'=>7,
                    'hex'=>'#0057a6'
                ],
                [
                    'title'=>'Brown',
                    'bl_num'=>8,
                    'hex'=>'#6b3f22'
                ],
                [
                    'title'=>'Light Gray',
                    'bl_num'=>9,
                    'hex'=>'#9c9c9c'
                ],
                [
                    'title'=>'Dark Gray',
                    'bl_num'=>10,
                    'hex'=>'#6b5a5a'
                ],
                [
                    'title'=>'Black',
                    'bl_num'=>11,
                    'hex'=>'#212121'
                ],
                [
                    'title'=>'Trans-Clean',
                    'bl_num'=>12,
                    'hex'=>'#eeeeee'
                ],
                [
                    'title'=>'Trans-Brown',
                    'bl_num'=>13,
                    'hex'=>'#939484'
                ],
                [
                    'title'=>'Trans-Dark Blue',
                    'bl_num'=>14,
                    'hex'=>'#00296b'
                ],
                [
                    'title'=>'Trans-Light Blue',
                    'bl_num'=>15,
                    'hex'=>'#68bcc5'
                ],
                [
                    'title'=>'Trans-Neon Green',
                    'bl_num'=>16,
                    'hex'=>'#c0f500'
                ],
                [
                    'title'=>'Trans-Red',
                    'bl_num'=>17,
                    'hex'=>'#d2babc'
                ],
                [
                    'title'=>'Trans-Neon Orange',
                    'bl_num'=>18,
                    'hex'=>'#ff4231'
                ],
                [
                    'title'=>'Trans-Yellow',
                    'bl_num'=>19,
                    'hex'=>'#ebf72d'
                ],
                [
                    'title'=>'Trans-Green',
                    'bl_num'=>20,
                    'hex'=>'#217625'
                ],
                [
                    'title'=>'Chrome Gold',
                    'bl_num'=>21,
                    'hex'=>'#f1f2e1'
                ],
                [
                    'title'=>'Chrome Silver',
                    'bl_num'=>22,
                    'hex'=>'#dcdcdc'
                ],
                [
                    'title'=>'Pink',
                    'bl_num'=>23,
                    'hex'=>'#f5cdd6'
                ],
                [
                    'title'=>'Purple',
                    'bl_num'=>24,
                    'hex'=>'#7a238d'
                ],
                [
                    'title'=>'Salmon',
                    'bl_num'=>25,
                    'hex'=>'#ff7d5d'
                ],
                [
                    'title'=>'Light Salmon',
                    'bl_num'=>26,
                    'hex'=>'#fcc7b7'
                ],
                [
                    'title'=>'Rust',
                    'bl_num'=>27,
                    'hex'=>'#b24817'
                ],
                [
                    'title'=>'Nougat',
                    'bl_num'=>28,
                    'hex'=>'#ffaf7d'
                ],
                [
                    'title'=>'Earth Orange',
                    'bl_num'=>29,
                    'hex'=>'#e6881d'
                ],
                [
                    'title'=>'Medium Orange',
                    'bl_num'=>31,
                    'hex'=>'#ffa531'
                ],
                [
                    'title'=>'Light Orange',
                    'bl_num'=>32,
                    'hex'=>'#ffbc36'
                ],
                [
                    'title'=>'Light Yellow',
                    'bl_num'=>33,
                    'hex'=>'#fee89f'
                ],
                [
                    'title'=>'Lime',
                    'bl_num'=>34,
                    'hex'=>'#c4e000'
                ],
                [
                    'title'=>'Light Lime',
                    'bl_num'=>35,
                    'hex'=>'#eceebd'
                ],
                [
                    'title'=>'Bright Green',
                    'bl_num'=>36,
                    'hex'=>'#10cb31'
                ],
                [
                    'title'=>'Medium Green',
                    'bl_num'=>37,
                    'hex'=>'#91df8c'
                ],
                [
                    'title'=>'Light Green',
                    'bl_num'=>38,
                    'hex'=>'#d7eed1'
                ],
                [
                    'title'=>'Dark Turquoise',
                    'bl_num'=>39,
                    'hex'=>'#00a29f'
                ],
                [
                    'title'=>'Light Turquoise',
                    'bl_num'=>40,
                    'hex'=>'#00c5bc'
                ],
                [
                    'title'=>'Aqua',
                    'bl_num'=>41,
                    'hex'=>'#bce5dc'
                ],
                [
                    'title'=>'Medium Blue',
                    'bl_num'=>42,
                    'hex'=>'#82add8'
                ],
                [
                    'title'=>'Violet',
                    'bl_num'=>43,
                    'hex'=>'#3448a4'
                ],
                [
                    'title'=>'Light Violet',
                    'bl_num'=>44,
                    'hex'=>'#c9cae2'
                ],
                [
                    'title'=>'Glow In Dark Opaque',
                    'bl_num'=>46,
                    'hex'=>'#d4d5c9'
                ],
                [
                    'title'=>'Dark Pink',
                    'bl_num'=>47,
                    'hex'=>'#ef5bb3'
                ],
                [
                    'title'=>'Sand Green',
                    'bl_num'=>48,
                    'hex'=>'#a2bfa3'
                ],
                [
                    'title'=>'Very Light Gray',
                    'bl_num'=>49,
                    'hex'=>'#e8e8e8'
                ],
                [
                    'title'=>'Trans-Dark Pink',
                    'bl_num'=>50,
                    'hex'=>'#ce1d9b'
                ],
                [
                    'title'=>'Trans-Purple',
                    'bl_num'=>51,
                    'hex'=>'#5525b7'
                ],
                [
                    'title'=>'Chrome Blue',
                    'bl_num'=>52,
                    'hex'=>'#5c66a4'
                ],
                [
                    'title'=>'Sand Purple',
                    'bl_num'=>54,
                    'hex'=>'#b57da5'
                ],
                [
                    'title'=>'Sand Blue',
                    'bl_num'=>55,
                    'hex'=>'#8899ab'
                ],
                [
                    'title'=>'Light Pink',
                    'bl_num'=>56,
                    'hex'=>'#f2d3d1'
                ],
                [
                    'title'=>'Chrome Antique Brass',
                    'bl_num'=>57,
                    'hex'=>'#645a4c'
                ],
                [
                    'title'=>'Sand Red',
                    'bl_num'=>58,
                    'hex'=>'#c58d80'
                ],
                [
                    'title'=>'Dark Red',
                    'bl_num'=>59,
                    'hex'=>'#6a0e15'
                ],
                [
                    'title'=>'Milky White',
                    'bl_num'=>60,
                    'hex'=>'#d4d3dd'
                ],
                [
                    'title'=>'Pearl Light Gold',
                    'bl_num'=>61,
                    'hex'=>'#e7ae5a'
                ],
                [
                    'title'=>'Light Blue',
                    'bl_num'=>62,
                    'hex'=>'#c8d9e1'
                ],
                [
                    'title'=>'Dark Blue',
                    'bl_num'=>63,
                    'hex'=>'#243757'
                ],
                [
                    'title'=>'Chrome Green',
                    'bl_num'=>64,
                    'hex'=>'#3cb371'
                ],
                [
                    'title'=>'Metallic Gold',
                    'bl_num'=>65,
                    'hex'=>'#b8860b'
                ],
                [
                    'title'=>'Pearl light Gray',
                    'bl_num'=>66,
                    'hex'=>'#acb7c0'
                ],
                [
                    'title'=>'Metallic Silver',
                    'bl_num'=>67,
                    'hex'=>'#c0c0c0'
                ],
                [
                    'title'=>'Dark Orange',
                    'bl_num'=>68,
                    'hex'=>'#b35408'
                ],
                [
                    'title'=>'Dark Tan',
                    'bl_num'=>69,
                    'hex'=>'#b89869'
                ],
                [
                    'title'=>'Metallic Green',
                    'bl_num'=>70,
                    'hex'=>'#bdb573'
                ],
                [
                    'title'=>'Magenta',
                    'bl_num'=>71,
                    'hex'=>'#b72276'
                ],
                [
                    'title'=>'Maersk Blue',
                    'bl_num'=>72,
                    'hex'=>'#7dc1d8'
                ],
                [
                    'title'=>'Medium Violet',
                    'bl_num'=>73,
                    'hex'=>'#9391e4'
                ],
                [
                    'title'=>'Trans-Medium Blue',
                    'bl_num'=>74,
                    'hex'=>'#76a3c8'
                ],
                [
                    'title'=>'Medium Lime',
                    'bl_num'=>76,
                    'hex'=>'#dfe000'
                ],
                [
                    'title'=>'Pearl Dark Gray',
                    'bl_num'=>77,
                    'hex'=>'#666660'
                ],
                [
                    'title'=>'Pearl Sand Blue',
                    'bl_num'=>78,
                    'hex'=>'#868faa'
                ],
                [
                    'title'=>'Dark Green',
                    'bl_num'=>80,
                    'hex'=>'#2e5543'
                ],
                [
                    'title'=>'Flat Dark Gold',
                    'bl_num'=>81,
                    'hex'=>'#ad7118'
                ],
                [
                    'title'=>'Pearl White',
                    'bl_num'=>83,
                    'hex'=>'#e2e2e2'
                ],
                [
                    'title'=>'Copper',
                    'bl_num'=>84,
                    'hex'=>'#ac6d52'
                ],
                [
                    'title'=>'Dark Bluish Gray',
                    'bl_num'=>85,
                    'hex'=>'#595d60'
                ],
                [
                    'title'=>'Light Bluish Gray',
                    'bl_num'=>86,
                    'hex'=>'#afb5c7'
                ],
                [
                    'title'=>'Sky Blue',
                    'bl_num'=>87,
                    'hex'=>'#8ad4e1'
                ],
                [
                    'title'=>'Reddish Brown',
                    'bl_num'=>88,
                    'hex'=>'#82422a'
                ],
                [
                    'title'=>'Dark Purple',
                    'bl_num'=>89,
                    'hex'=>'#5f2683'
                ],
                [
                    'title'=>'Light Nougat',
                    'bl_num'=>90,
                    'hex'=>'#feccb0'
                ],
                [
                    'title'=>'Light Brown',
                    'bl_num'=>91,
                    'hex'=>'#99663e'
                ],
                [
                    'title'=>'Light Purple',
                    'bl_num'=>93,
                    'hex'=>'#af3195'
                ],
                [
                    'title'=>'Medium Dark Pink',
                    'bl_num'=>94,
                    'hex'=>'#f785b1'
                ],
                [
                    'title'=>'Flat Silver',
                    'bl_num'=>95,
                    'hex'=>'#8d949c'
                ],
                [
                    'title'=>'Very Light Orange',
                    'bl_num'=>96,
                    'hex'=>'#ffdca4'
                ],
                [
                    'title'=>'Blue-Violet',
                    'bl_num'=>97,
                    'hex'=>'#506cef'
                ],
                [
                    'title'=>'Trans-Orange',
                    'bl_num'=>98,
                    'hex'=>'#e96f01'
                ],
                [
                    'title'=>'Very Light Bluish Gray',
                    'bl_num'=>99,
                    'hex'=>'#e4e8e8'
                ],
                [
                    'title'=>'Glitter Trans-Dark Pink',
                    'bl_num'=>100,
                    'hex'=>'#ce1d9b'
                ],
                [
                    'title'=>'Glitter Trans-Clear',
                    'bl_num'=>101,
                    'hex'=>'#b2adaa'
                ],
                [
                    'title'=>'Glitter Trans-Purple',
                    'bl_num'=>102,
                    'hex'=>'#3a2b82'
                ],
                [
                    'title'=>'Bright Light Yellow',
                    'bl_num'=>103,
                    'hex'=>'#fff08c'
                ],
                [
                    'title'=>'Bright Pink',
                    'bl_num'=>104,
                    'hex'=>'#f7bcda'
                ],
                [
                    'title'=>'Bright Light Blue',
                    'bl_num'=>105,
                    'hex'=>'#bcd1ed'
                ],
                [
                    'title'=>'Fabuland Brown',
                    'bl_num'=>106,
                    'hex'=>'#b3694e'
                ],
                [
                    'title'=>'Trans-Pink',
                    'bl_num'=>107,
                    'hex'=>'#ff8298'
                ],
                [
                    'title'=>'Trans-Bright Green',
                    'bl_num'=>108,
                    'hex'=>'#10cb31'
                ],
                [
                    'title'=>'Dark Blue-Violet',
                    'bl_num'=>109,
                    'hex'=>'#2032b0'
                ],
                [
                    'title'=>'Bright Light Orange',
                    'bl_num'=>110,
                    'hex'=>'#ffc700'
                ],
                [
                    'title'=>'Speckle Black-Silver',
                    'bl_num'=>111,
                    'hex'=>'#7c7e7c'
                ],
                [
                    'title'=>'Trans-Aqua',
                    'bl_num'=>113,
                    'hex'=>'#b7c8bf'
                ],
                [
                    'title'=>'Trans-Light Purple',
                    'bl_num'=>114,
                    'hex'=>'#b97ab1'
                ],
                [
                    'title'=>'Pearl Gold',
                    'bl_num'=>115,
                    'hex'=>'#e79e1d'
                ],
                [
                    'title'=>'Speckle Black-Copper',
                    'bl_num'=>116,
                    'hex'=>'#5f4e47'
                ],
                [
                    'title'=>'Speckle DBGray-Silver',
                    'bl_num'=>117,
                    'hex'=>'#4a6363'
                ],
                [
                    'title'=>'Glow In Dark Trans',
                    'bl_num'=>118,
                    'hex'=>'#bdc6ad'
                ],
                [
                    'title'=>'Pearl Very Light Gray',
                    'bl_num'=>119,
                    'hex'=>'#d4d2cd'
                ],
                [
                    'title'=>'Dark Brown',
                    'bl_num'=>120,
                    'hex'=>'#50372f'
                ],
                [
                    'title'=>'Trans-Neon Yellow',
                    'bl_num'=>121,
                    'hex'=>'#ffd700'
                ],
                [
                    'title'=>'Chrome Black',
                    'bl_num'=>122,
                    'hex'=>'#544e4f'
                ],
                [
                    'title'=>'Mx White',
                    'bl_num'=>123,
                    'hex'=>'#ffffff'
                ],
                [
                    'title'=>'Mx Light Bluish Gray',
                    'bl_num'=>124,
                    'hex'=>'#afb5c7'
                ],
                [
                    'title'=>'Mx Light Gray',
                    'bl_num'=>125,
                    'hex'=>'#9c9c9c'
                ],
                [
                    'title'=>'Mx Charcoal Gray',
                    'bl_num'=>126,
                    'hex'=>'#595d60'
                ],
                [
                    'title'=>'Mx Tile Gray',
                    'bl_num'=>127,
                    'hex'=>'#6b5a5a'
                ],
                [
                    'title'=>'Mx Black',
                    'bl_num'=>128,
                    'hex'=>'#000000'
                ],
                [
                    'title'=>'Mx Red',
                    'bl_num'=>129,
                    'hex'=>'#b52c20'
                ],
                [
                    'title'=>'Mx Pink Red',
                    'bl_num'=>130,
                    'hex'=>'#f45c40'
                ],
                [
                    'title'=>'Mx Tile Brown',
                    'bl_num'=>131,
                    'hex'=>'#330000'
                ],
                [
                    'title'=>'Mx Brown',
                    'bl_num'=>132,
                    'hex'=>'#907450'
                ],
                [
                    'title'=>'Mx Buff',
                    'bl_num'=>133,
                    'hex'=>'#dec69c'
                ],
                [
                    'title'=>'Mx Terracotta',
                    'bl_num'=>134,
                    'hex'=>'#5c5030'
                ],
                [
                    'title'=>'Mx Orange',
                    'bl_num'=>135,
                    'hex'=>'#f47b30'
                ],
                [
                    'title'=>'Mx Light Orange',
                    'bl_num'=>136,
                    'hex'=>'#f7ad63'
                ],
                [
                    'title'=>'Mx Light Yellow',
                    'bl_num'=>137,
                    'hex'=>'#ffe371'
                ],
                [
                    'title'=>'Mx Ochre Yellow',
                    'bl_num'=>138,
                    'hex'=>'#fed557'
                ],
                [
                    'title'=>'Mx Lemon',
                    'bl_num'=>139,
                    'hex'=>'#bdc618'
                ],
                [
                    'title'=>'Mx Olive Green',
                    'bl_num'=>140,
                    'hex'=>'#7c9051'
                ],
                [
                    'title'=>'Mx Pastel Green',
                    'bl_num'=>141,
                    'hex'=>'#7db538'
                ],
                [
                    'title'=>'Mx Aqua Green',
                    'bl_num'=>142,
                    'hex'=>'#27867e'
                ],
                [
                    'title'=>'Mx Tile Blue',
                    'bl_num'=>143,
                    'hex'=>'#0057a6'
                ],
                [
                    'title'=>'Mx Medium Blue',
                    'bl_num'=>144,
                    'hex'=>'#61afff'
                ],
                [
                    'title'=>'Mx Pastel Blue',
                    'bl_num'=>145,
                    'hex'=>'#68aece'
                ],
                [
                    'title'=>'Mx Teal Blue',
                    'bl_num'=>146,
                    'hex'=>'#467083'
                ],
                [
                    'title'=>'Mx Violet',
                    'bl_num'=>147,
                    'hex'=>'#bd7d85'
                ],
                [
                    'title'=>'Mx Pink',
                    'bl_num'=>148,
                    'hex'=>'#f785b1'
                ],
                [
                    'title'=>'Mx Clear',
                    'bl_num'=>149,
                    'hex'=>'#ffffff'
                ],
                [
                    'title'=>'Medium Nougat',
                    'bl_num'=>150,
                    'hex'=>'#e3a05b'
                ],
                [
                    'title'=>'Speckle Black-Gold',
                    'bl_num'=>151,
                    'hex'=>'#ab9421'
                ],
                [
                    'title'=>'Light Aqua',
                    'bl_num'=>152,
                    'hex'=>'#cfefea'
                ],
                [
                    'title'=>'Dark Azure',
                    'bl_num'=>153,
                    'hex'=>'#009fe0'
                ],
                [
                    'title'=>'Lavender',
                    'bl_num'=>154,
                    'hex'=>'#d3bde3'
                ],
                [
                    'title'=>'Olive Green',
                    'bl_num'=>155,
                    'hex'=>'#aba953'
                ],
                [
                    'title'=>'Medium Azure',
                    'bl_num'=>156,
                    'hex'=>'#6acee0'
                ],
                [
                    'title'=>'Medium Lavender',
                    'bl_num'=>157,
                    'hex'=>'#c689d9'
                ],
                [
                    'title'=>'Yellowish Green',
                    'bl_num'=>158,
                    'hex'=>'#e7f2a7'
                ],
                [
                    'title'=>'Glow In Dark White',
                    'bl_num'=>159,
                    'hex'=>'#d9d9d9'
                ],
                [
                    'title'=>'Fabuland Orange',
                    'bl_num'=>160,
                    'hex'=>'#ef9121'
                ],
                [
                    'title'=>'Dark Yellow',
                    'bl_num'=>161,
                    'hex'=>'#dd982e'
                ],
                [
                    'title'=>'Glitter Trans-Light Blue',
                    'bl_num'=>162,
                    'hex'=>'#68bcc5'
                ],
                [
                    'title'=>'Glitter Trans-Neon Green',
                    'bl_num'=>163,
                    'hex'=>'#c0f500'
                ],
                [
                    'title'=>'Trans-Light Orange',
                    'bl_num'=>164,
                    'hex'=>'#e99a3a'
                ],
                [
                    'title'=>'Neon Orange',
                    'bl_num'=>165,
                    'hex'=>'#fa5947'
                ],
                [
                    'title'=>'Neon Green',
                    'bl_num'=>166,
                    'hex'=>'#dbf355'
                ],
                [
                    'title'=>'Reddish Orange',
                    'bl_num'=>167,
                    'hex'=>'#ff5500'
                ],
                [
                    'title'=>'Sienna',
                    'bl_num'=>169,
                    'hex'=>'#82422a'
                ],
                [
                    'title'=>'Satin Trans-Yellow',
                    'bl_num'=>170,
                    'hex'=>'#ebf72d'
                ],
                [
                    'title'=>'Unset',
                    'bl_num'=>1000,
                    'hex'=>'#ebf72d'
                ],
            ];
        foreach ($data as $fill)
        {
            Color::create($fill);
        }
        dd('succ');
    }
}
