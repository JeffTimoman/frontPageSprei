<?php

namespace Database\Seeders;

use App\Models\Departement;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for($i = 0; $i < 30; $i++) {
        //     User::create([
        //         'name' => fake()->name(),
        //         'email'=> 'user' . $i . '@gmail.com',
        //         'departement_id' => 2,
        //         'password' => bcrypt('admin123')
        //     ]);
        // }



        $ppti_email = ['aryakasyahrezki@gmail.com', 'bebensianipar15@gmail.com', 'cpjj596@gmail.com', 'caxyla@gmail.com', 'hanna.aurelly56@gmail.com', 'crisvitoc@gmail.com', 'deaudreyla30@gmail.com', 'diazagil061@gmail.com', 'evangerardwijaya@gmail.com', 'henry.christian7557@gmail.com', 'violensanjaya@gmail.com', 'ngurahbagus13@gmail.com', 'ivanchristian2005@gmail.com', 'iyurichielay@gmail.com', 'jeremyes25@gmail.com', 'josh.moritty@gmail.com', 'leonardwangka@gmail.com', 'abelmahotama@gmail.com', 'mariobenedict77@gmail.com', 'kireina31106@gmail.com', 'mkev46p@gmail.com', 'reynaldi191818@gmail.com', 'erasmariasutanto@gmail.com', 'nkita.putri@gmail.com', 'rachmaherman777@gmail.com', 'shallomoc01lase@gmail.com', 'formethanshane@gmail.com', 'shinta05juli@gmail.com', 'stephen.christopher.domsav@gmail.com', 'stevenkukilo@gmail.com', 'thomasseowinata08@gmail.com', 'vincentfernandes1708@gmail.com', 'vmuliawan29@gmail.com', 'wilsonlastname02@gmail.com', 'yonami2005@gmail.com', 'adrielbth01@gmail.com', 'agunggramadhann@gmail.com', 'kangger97@gmail.com', 'clerensiajazz@gmail.com', 'daracikn@gmail.com', 'csoassasin@gmail.com', 'timotiusdarren@gmail.com', 'deliciabathania18@gmail.com', 'fancesatria.rpl@gmail.com', 'gabmar1505@gmail.com', 'helenfeb03@gmail.com', 'karzyyyy@gmail.com', 'joneakristiawan@gmail.com', 'Kentnathanael06@gmail.com', 'kevinjiovannikuslin@gmail.com', 'kevintanwiputra1908@gmail.com', 'leowijaya.alexander@gmail.com', 'lynelangel186@gmail.com', 'm.qaishar.arif.navarino@gmail.com', 'nathanpanget0905@gmail.com', 'diahsdv@gmail.com', 'nicholaswilliam2406@gmail.com', 'kimmyyonata24@gmail.com', 'oliviathe102@gmail.com', 'jasonfernando100@gmail.com', 'dwioktaviantor@gmail.com', 'samudradhika@gmail.com', 'samuelhelena99@gmail.com', 'sidneylias8@gmail.com', 'syarifanaamaliaputri@gmail.com', 'theo.yuriputra19@gmail.com', 'vincenttanaka180@gmail.com', 'handojowilson@gmail.com', 'yauwlinda22@gmail.com', 'yosuawg19@gmail.com', 'gonxhaagnes12@gmail.com', 'akbarekaputra01@gmail.com', 'putuedo33@gmail.com', 'andizulfikar831@gmail.com', 'adrsclvin@gmail.com', 'ardikahidayaturrohman@gmail.com', 'bioalexandri@gmail.com', 'michaelcalvinmartin@gmail.com', 'edwinhendly17@gmail.com', 'Feliciahuang3216@gmail.com', 'tinywill10@gmail.com', 'siwandanabagus@gmail.com', 'hazelhandrata@gmail.com', 'madewikanta1@gmail.com', 'yusuf.setiobudi2006@gmail.com', 'jasonwijaya2006@gmail.com', 'jessielavonna123@gmail.com', 'joyrochelle08@gmail.com', 'kaleblister36@gmail.com', 'kei10race@gmail.com', 'kennywijaya123crb@gmail.com', 'kevinfernando953@gmail.com', 'lidyalaura04@gmail.com', 'sherinanatalia28@gmail.com', 'mariaprincessilia@gmail.com', 'andersonmatthew148@gmail.com', 'randystarasta@gmail.com', 'ranggamulia.xpro@gmail.com', 'stievenlee0@gmail.com', 'theofrolic@gmail.com', 'adeliachristi123@gmail.com', 'timotheusedward@gmail.com', 'william.fs2006@gmail.com', 'pratamawilliam37@gmail.com', 'yoyadaindrayudha@gmail.com'];

        $ppti_password = ['081236883648', '081315609770', '082375757687', '087774666671', '081398717229', '089621078480', '0895360866345', '083169435778', '081230082437', '085156476810', '087782925757', '085934525999', '081246794610', '085697917798', '089516981717', '082234037522', '083175553652', '087863300999', '081808625515', '08112343116', '08974119512', '085348780800', '083170319097', '0895330865868', '0895336100067', '081230203921', '82269228452', '081517060968', '081325982565', '082337855902', '089677357953', '0895636535530', '085972581456', '085246164556', '089513839425', '085155353750', '085156795229', '0895424000953', '082256227575', '0895385152674', '083181817570', '089655680817', '081281195108', '089617320859', '088224856447', '081340161238', '087769671590', '0818839729', '08117851601', '08165439399', '085719851198', '085175022275', '081256363618', '089687145511', '081231620503', '0895342604138', '089678456466', '087788448765', '81369549078', '0895711117788', '081219883509', '085774723769', '082278830118', '081776767045', '081311201808', '0823-2576-3700', '082169444383', '089517064659', '085829260185', '081230797121', '0882003342815', '081380279293', '081246514598', '082196490787', '081317539933', '089507885363', '082321748982', '088991507744', '089694636303', '083890077785', '081913205163', '089513129977', '085790826168', '085826243163', '087736484878', '081807000978', '083878469102', '081286753241', '08888169495', '08996191920', '085323129339', '089690281500', '08970400967', '089636512448', '081278522824', '085758016188', '081325437961', '087885594454', '089627668122', '082113674903', '085156207289', '081281823409', '087850173490', '082181780827', '08117701965'];

        $ppti_name = ['Aryaka Syahrezki', 'Beben Rafli Luhut Tua Sianipar', 'Callista Patricia Jojo', 'Carissa Xyla Oxaveria', 'Claudia Hanna Aurelly Mamahit', 'Crisvito', 'Dea Audreyla Hadi', 'Diaz Agil Prasetyo', 'Evan Gerard', 'Henry Christian', 'Hillary Violen Christalia Sanjaya', 'I Gusti Ngurah Radithya Bagus Santosa', 'Ivan Andrianus Christian', 'Iyurichie Lay', 'Jeremy Emmanuel Susilo', 'Josh Rolando Moritty', 'Leonard Wangka', 'Made Abel Surya Mahotama', 'Mario Benedict', 'Metta Kireina Tedjasurya', 'Michael Kevin Pratama', 'MUHAMMAD REYNALDI DWI SAPUTRA', 'Nicko Richardo', 'Nikita Putri Alexia', 'Rachma Hermanto', 'Shallom Otniel Christofel Lase', 'Shane Marvelous Reiven Formethan', 'Shinta Aulia', 'Stephen Christopher', 'Steven Kukilo Seto', 'Thomas Seowinata', 'Vincent Fernandes', 'Vincent Muliawan', 'Wilson', 'Yonami Trisandora', 'Adriel Bernhard Tanuhariono', 'AGUNG RAMADHAN', 'Angger Dhisma Kusuma', 'Clarissa Jesselyn', 'Dara Cantika Febrian Kinasih', 'Darren Pratama Wijaya', 'Darren Timotius Raphael', 'Delicia Nathania', 'Fance Satria Nusantara', 'Gabriel Martin Prasona', 'Helen Febriyanto', 'Jazzy', 'Jonea Kristiawan', 'Kent Nathanael', 'Kevin Jiovanni Kuslin', 'Kevin Tanwiputra', 'Leonardo Alexander Wijaya', 'Lynel Angelica Madelyn', 'M Qaishar Arif Navarino', 'Nathaniel Christodeo Panget', 'NI NYOMAN DIAH SARASWATI DEVITRI', 'Nicholas William', 'Oktavianus Kimmy Yonata', 'Olivia The', 'Ong Cornellius Jason Fernando', 'Rio Dwi Oktavianto', 'Samudra Bryandhika Prakoso', 'Samuel Christian Chandra', 'Sidney Lias', 'SYARIFANA AMALIA PUTRI', 'Theodorus Yuriputra Wibisono', 'Vincent Tanaka', 'Wilson Handojo', 'Yauw Linda Aprilly Suryani Harta', 'Yosua Wibisono Gozali', 'Agnes Gonxha Febriane Sukma', 'Akbar Eka Putra', 'Alfredo Putu Setyanugraha Atmaja', 'ANDI ZULFIKAR', 'Andreas Calvin Hartono', 'Ardika Hidayatur Rohman', 'Bioline Alexandri Hendra Santosa', 'Calvin Martin', 'Edwin Hendly', 'FELICIA WIJAYA', 'FINO WILDAN RAMADAN', 'I Gusti Bagus Arya Siwandana Janatha', 'I Gusti Rai Hazel Nakhwah Handrata', 'I Made Wikanta Dananjaya Githa', 'Imanuel Yusuf Setio Budi', 'JASON WIJAYA', 'Jessie La Vonna Sanjaya', 'Joy Rochelle Kartolo', 'Kaleb Lister', 'Keisha Grace Kristian', 'Kenny Wijaya', 'Kevin Fernando', 'Lidya Laura Sutanto', 'LUCIA SHERINA NATALIA KRISTIANTI', 'Maria Princessilia', 'MATTHEW ANDERSON', 'Randysta Rasta Putra', 'Rangga Mulia Tohpati', 'Stieven Lee', 'Theofrolic Anathapindika Dean', 'Theresa Adelia Christi', 'Timotheus Edward Setiawan', 'William Fernando Sukemi', 'William Pratama', 'Yoyada Indrayudha'];

        $ppti_password_add = ['sur', 'bog', 'ban', 'bek', 'bog', 'bal', 'tan', 'del', 'sur', 'jak', 'pal', 'mat', 'ata', 'bek', 'sem', 'sur', 'leb', 'sin', 'jak', 'ban', 'yog', 'ban', 'pan', 'jak', 'sem', 'jak', 'pal', 'bog', 'sid', 'ban', 'pek', 'pal', 'tan', 'pon', 'ben', 'sem', 'dep', 'teg', 'pon', 'bek', 'jak', 'ban', 'tan', 'sid', 'jak', 'sem', 'pal', 'sur', 'pal', 'sur', 'jak', 'tan', 'pon', 'pal', 'yog', 'den', 'pon', 'bek', 'pal', 'sem', 'jak', 'jak', 'pra', 'pal', 'tan', 'kla', 'pek', 'bek', 'bad', 'sur', 'cil', 'bek', 'yog', 'bon', 'tan', 'pat', 'jak', 'sur', 'pon', 'teb', 'mal', 'lom', 'sur', 'klu', 'cim', 'tan', 'pan', 'dep', 'tan', 'ban', 'cir', 'bat', 'sur', 'sol', 'ben', 'ban', 'kar', 'bog', 'jam', 'tan', 'bek', 'tan', 'sur', 'pal', 'tan'];

        $departement = Departement::where('name', 'PPTI 20')->first();
        for ($i = 0; $i < 35; $i++) {
            User::create([
                'email' => $ppti_email[$i],
                'name' => $ppti_name[$i],
                'password' => bcrypt($ppti_password_add[$i].$ppti_password[$i]),
                'departement_id' => $departement->id
            ]);
        }

        $departement = Departement::where('name', 'PPTI 21')->first();
        for ($i = 35; $i < 70; $i++) {
            User::create([
                'email' => $ppti_email[$i],
                'name' => $ppti_name[$i],
                'password' => bcrypt($ppti_password_add[$i].$ppti_password[$i]),
                'departement_id' => $departement->id
            ]);
        }

        $departement = Departement::where('name', 'PPTI 22')->first();
        for ($i = 70; $i < 105; $i++) {
            User::create([
                'email' => $ppti_email[$i],
                'name' => $ppti_name[$i],
                'password' => bcrypt($ppti_password_add[$i].$ppti_password[$i]),
                'departement_id' => $departement->id
            ]);
        }
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'departement_id' => 1,
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'buying_limit' => 1000000,
        ]);
        // User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin1@admin.com',
        //     'departement_id' => 1,
        //     'password' => bcrypt('admin123'),
        //     'role' => 'admin',
        //     'buying_limit' => 2,
        // ]);
        // User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin2@admin.com',
        //     'departement_id' => 1,
        //     'password' => bcrypt('admin123'),
        //     'buying_limit' => 2,
        // ]);
    }
}
