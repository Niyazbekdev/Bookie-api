<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{

    public function run(): void
    {
        Book::create([
            'title' => 'Kishkene shahzada',
            'description' =>'Ushıwshı, Kishkene shahzada, Túlki hám jılan – bul filosofiyalıq ertektiń tiykarǵı qaharmanları. Óz planetasın taslap ketip, álem boylap sayaxat etken Kishkene shahzada ómirdiń mazmunı ne ekenligin túsinedi – ol tuwılǵan planetasında óz gúlin súyiwi, onıń qádirin biliwdi úyreniwi kerek eken. Shıǵarma jas óspirimler hám úlkenler ushın birdey qızıqlı hám mánili.',
            'slug' => 'kishkene-shahzada',
            'price' => 20000,
            'category_id' => 1,
            'author_id' => 1,
            'narrator_id' => 1,
        ]);

        Book::create([
            'title' => 'Qızıl hám Qara',
            'description' =>'Stendal “Italyada súwretlew óneri tarıyxı”, “Gaydn, Mocart hám Metastazio”, “Rossinidiń ómiri”, “Rasin hám Shekspir” sıyaqlı shıǵarmaları menen keń jámiyetshilikke tanıs edi. Biraq jazıwshını romanshı sıpatında dúnyaǵa dańqın jayǵan demi ótkir shıǵarmalarınan biri – bul “Qızıl hám Qara” romanı. Bul roman waqıt samalların psient etpey, sol-sol qúdireti hám sıyqırlı kúshi menen adamlar qálbine jaqsılıq hám haqıyqat tuqımın sewip kelmekte.',
            'slug' => 'qizil-ham-qara',
            'price' => 20000,
            'category_id' => 1,
            'author_id' => 2,
            'narrator_id' => 1,
        ]);

        Book::create([
            'title' => 'Qoyın dápterdegi jazıwlar',
            'description' =>'Bul kitap baslanǵanda jazıwshı shıǵarmanı qırq jıl dawamında jazǵanlıǵın aytıp ótedi. Hám men bunı ómirim dawamında asıqpastan jazdım hám siz de bul kitaptı asıqpastan oqıń degen sózler keltiriledi. Bul kitap jazıwshınıń ómiri dawamında shıǵarǵan juwmaqları esaplanadı hám bul juwmaqlardıń hár birin kitap etip shıǵarsa bolatuǵın maǵlıwmatlar jámlengen. Bul shıǵarma ómir dawamında jazılǵan hám onda siziń de ómirińiz dawamında kerekli bolatuǵın ibratlı sózler bar. Geybir gúrrińlerdi oqıp oylanasız, geybirewlerin oqıp jılaysız. Geybirewlerinen juwmaq shıǵara otırıp jáne birewlerinen bolsa ózińizge kerekli bolǵan sózlerdi qay qayta-qayta ayta berip yad bolıp ketkenligin bilmey de qalasız.',
            'slug' => 'qoyin-dapterdegi-jaziwlar',
            'price' => 17000,
            'category_id' => 2,
            'author_id' => 3,
            'narrator_id' => 2,
        ]);

        Book::create([
            'title' => 'Uluǵbek ǵáziynesi',
            'description' => 'Ata-babalardıń basıp ótken dańqlı jolı búgingi hám keleshek áwladlarǵa óz shuǵlasın shashıp tura beredi. Tariyx usınday qanshadan-qansha úlgi turarlıq dańqlı jollarǵa gúwa. Ózbekstan xalıq jazıwshısı Ádil Yaqubovtıń “Ulıǵbek ǵáziynesi” atlı romanı siz oqıwshılarǵa jaqsı tanıs. Shıǵarmada ullı Sahıpqıran Ámir Temurdıń súyikli aqlıǵı, tariyxta hám patsha, hám alım sıpatında belgili bolǵan Muhammed Taraǵay Ulıǵbektiń ómiri, baxıtsız táǵdiri haqqında qayǵılı sóz etiledi.',
            'slug' => 'ulugbek-gaziynesi',
            'price' => 17000,
            'category_id' => 2,
            'author_id' => 4,
            'narrator_id' => 2,
        ]);

        Book::create([
            'title' => 'Qaraalpaq',
            'description' =>'Qaraqalpaqlardıń 1221-jıldan baslap tap házirgi kúnge shekem tariyxınıń audiokitabı.',
            'slug' => 'qaraalpaq',
            'price' => 15000,
            'category_id' => 3,
            'author_id' => 5,
            'narrator_id' => 3,
        ]);

        Book::create([
            'title' => 'Meniń jolbarıslar menen jolıǵısıwlarım',
            'description' => 'Á.Shamuratov bul povestinde Ámiwdáryanıń keń, qalıń toǵaylarında túrli quslar hám jırtqısh haywanlar kóp. Bul jerlerde uzaq úlkelerden jabayı quslar in qurıp, palapan ashıw ushın keledi. Qalıń qamıslıqlarda jabayı dońızlar, jolbarıslar da jasaydı. Jazıwshı jabayı quslardı hám jırtqısh haywanlardı jaslıǵında qalay awlaǵanın, ásirese, jolbarıs awın qanday qıyınshılıqlar menen ótkergenligin usı kishkene povestinde júdá qızıqlı etip súwretlegen.',
            'slug' => 'menin-jolbarislar-menen-joligisiwlarim',
            'price' => 15000,
            'category_id' => 3,
            'author_id' => 6,
            'narrator_id' => 3,
        ]);

        Book::create([
            'title' => 'Qaraqalpaq folklorı',
            'description' => '“Qaraqalpaq folklorı” (kóp tomlıq) 67-76-tomlar Ertekler bólimi Ertekler – xalıq awızeki dóretpeleriniń ishindegi eń eski úlgileriniń biri sıpatında erte dáwirlerden-aq payda bolıp, hár qıylı jámiyetlik tásirlerge baylanıslı rawajlanıp kiyatırǵan túrleriniń biri. Bul dóretpeler dúnya júzi xalıqlarınıń ertekleri menen hártárepleme uqsas bolıwına qaramastan, tereń milliy sıpatlarǵa iye. Qaraqalpaq xalıq erteklerinde de alıs ata-babalardıń, álleneshshe áwladlardıń dóretiwshilik qábiletlerin belgileytuǵın faktorlar, arzıw-ármanların, turmıs tájiriybelerin, dúnyaǵa kóz-qarasların kórsetetuǵın syujetler menen motivler milliy talaplarǵa ılayıq súwretlenedi.',
            'slug' => 'qaraqalpaq-folklori',
            'price' => 1000,
            'category_id' => 4,
            'author_id' => 7,
            'narrator_id' => 3,
        ]);

        Book::create([
            'title' => 'Ógiz, eshki hám qoraz',
            'description' => 'Bul Qaraqalpaq folklorındaǵı ertekler bólimi',
            'slug' => 'ogiz,-eshki-ham-qoraz',
            'price' => 1000,
            'category_id' => 4,
            'author_id' => 7,
            'narrator_id' => 2,
        ]);
    }
}
