<?php

namespace Database\Seeders;

use App\Models\Departement;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::where('id', 108)->delete();
        // User::create([
        //     'name' => 'Jayadi Steven',
        //     'email' => 'jayadisteven1@gmail.com',
        //     'password' => bcrypt('pas085156227671'),
        //     'departement_id' => Departement::where('name', 'PPTI 22')->first()->id
        // ]);
        $ppti_email = ['alvinalvin861@gmail.com', 'anastasyadevchr@gmail.com', 'angelafeliciaa05@gmail.com', 'ashley17906@gmail.com', 'catherinejollie935@gmail.com', 'ctjusanto@gmail.com', 'charleneyovita16@gmail.com', 'Chelsea.cecil05@gmail.com', 'ristaviashaclarisya@gmail.com', 'cornelia.lisia@gmail.com', 'cungfinius@gmail.com', 'davidnatalino12@gmail.com', 'e.celine.v@gmail.com', 'finnethakd@gmail.com', 'florenzamarvella19@gmail.com', 'hellenfangfang245@gmail.com', 'intanhia001@gmail.com', 'jelitaaolivia@gmail.com', 'jevan104@gmail.com', 'shesterjoshua@gmail.com', 'Jovanka.tandy@gmail.com', 'kabasaskia2006@gmail.com', 'dellasintya20@gmail.com', 'kania0405@gmail.com', 'susantokaryn.ks@gmail.com', 'katherinejunitha2@gmail.com', 'keishameivianna26@gmail.com', 'laura15amelia@gmail.com', 'veronikacalliesta@gmail.com', 'louisahanny.sm@gmail.com', 'l.divareginaputri13@gmail.com', 'nadineamandaa2@gmail.com', 'ceannatasha23@gmail.com', 'deven.loper05@gmail.com', 'nichollecs12@gmail.com', 'ningayuagustin2@gmail.com', 'monicawijayaa25@gmail.com', 'wijayasaputrarichard@gmail.com', 'odeliashanessa@gmail.com', 'stevieclaudya04@gmail.com', 'theoladariuswiguno2@gmail.com', 'theresiaalexandra25@gmail.com', 'tracymaringka@gmail.com', 'valencia.yosephine06@gmail.com', 'varlonianeyrine@gmail.com', 'agnesiranata@gmail.com', 'agnessche53@gmail.com', 'angelicafaustaa@gmail.com', 'audylia05@gmail.com', 'mauree.indira@gmail.com', 'diogante040707@gmail.com', 'chelseybong@gmail.com', 'christy.caroline06@gmail.com', 'clairine2929@gmail.com', 'claresta301006@gmail.com', 'danielb7171@gmail.com', 'deandra.abigail@gmail.com', 'ratnadiadivyani@gmail.com', 'dheanataliaf123@gmail.com', 'elvinajessica26@gmail.com', 'Fionaregina19@gmail.com', 'gabriellamaurene08@gmail.com', 'giovannijom27@gmail.com', 'gloriaarroyoseventeen@gmail.com', 'jasmine.valerine@gmail.com', 'jeniferolivia29@gmail.com', 'jessica.lucky24@gmail.com', 'joeneniko@gmail.com', 'kanyagaluh101@gmail.com', 'kesyapetra01@gmail.com', 'leonyvalenciaa86@gmail.com', 'shellalidya1212@gmail.com', 'madeardanasgr18@gmail.com', 'marizabelgwyneth@gmail.com', 'linlinmarlin02@gmail.com', 'marvinlevi2005@gmail.com', 'meisyays855@gmail.com', 'Chelle010405@gmail.com', 'monaliisaa18@gmail.com', 'nathaniaam06@gmail.com', 'Nikhitachintya@gmail.com', 'agustinusrevan7@gmail.com', 'dracozweijan@gmail.com', 'riskanaomi123@gmail.com', 'rozhaamalia91@gmail.com', 'stellayopi@gmail.com', 'tiaraivanaoke10@gmail.com', 'tiaralimanto06@gmail.com', 'valenciaseptianywijaya@gmail.com', 'vanesyairnawan@gmail.com'];
        $ppti_name = ['Alvin Aerio Saner', 'Anastasya Devina Christabel', 'Angela Felicia Gunawan', 'Ashley Venezia Liem', 'Catherine Jollie', 'Charice Tjusanto', 'Charlene Yovita Hermawan Tanudjaja', 'Chelsea Cecilia', 'Clarisya Ristaviasha', 'Cornelia Lisia Gunawan', 'CUNGFINIUS FINNATA HUSIN', 'David Natalino', 'Elizabeth Celine Vega', 'Finnetha Kamaniya Dharmasatya', 'Florenza Marvella Wangdjaya', 'HELLEN FANG FANG', 'Intan Septianias Hia', 'Jelita Olivia Wijaya', 'Jevan Immanuel Gunadi', 'Joshua Hester Sumampouw', 'Jovanka Chleo Tandy', 'Kaba Saskia', 'Kadek Della Ayu Sintya', 'Kania Larisa Dwiyani', 'Karyn Susanto', 'Katherine Junitha', 'Keisha Meivianna', 'Laura Amelia', 'Lienly Calliesta', 'Louisa Hanny Schat Mariene', 'Luh Diva Regina Putri', 'Nadine Amanda', 'Natasha Christania Ananta', 'Nathania Alanta', 'NICHOLLE CHRISTIE SAPUTRO', 'Pande Putu Puspaningayu Agustin', 'Rachel Monica Wijaya', 'Richard Wijaya Putra', 'SHANESSA ODELIA', 'Stevie Claudya Putri Nober', 'Theola Darius Wiguno', 'Theresia Alexandra', 'Tracy Rachel Maringka', 'Valencia Yosephine Riani', 'Varlonia Neyrine', 'Agnes Iranata Silaen', 'Agnesia Chelsea', 'Angelica Fausta', 'Audylia Putri Lukito', 'Beatriz Maureen Indira', 'Benedict Christiano Mahardika', 'Chelsey Velysia Bong', 'Christy Caroline', 'Clairine Angelica', 'Claresta Madelynne Tanjaya', 'Daniel Budiono', 'Deandra Abigail Oey', 'Dewa Ayu Ratnadia Divyani', 'Dhea Natalia Fernanda', 'Elvina Jessica', 'Fiona Regina', 'GABRIELLA KUSUMA', 'Giovanni Joaquine Mulya', 'Gloria Macapagal Arroyo Subagyo', 'Jasmine Valerine', 'Jenifer Olivia Hadibrata', 'Jessica Florencia', 'Joen Friska', 'Kadek Kanya Galuh Pradnyamita', 'Kesya Petra Demiora', 'Leony Valencia Sarita', 'Lydia Marshela Shagan', 'Made Ardana', 'Marizabel Gwyneth Sasmita', 'Marlin Daegal Puspa Dewi', 'Marvin Levi', 'Meisya Yolanda Sharonita', 'Michelle Devani', 'Monalisa', 'Nathania Angelica Maurilla', 'Nikhita Chintya Dianto', 'Revan', 'Revata Dracozwei', 'Riska Naomi Nababan', 'Rozha Amalia Solichin', 'Stella Deby Natalie', 'Tiara Ivana', 'Tiara Limanto', 'Valencia Septiany Wijaya', 'Vanesya Irnawan Putri'];
        $ppti_password = ['085716747350', '08154073794', '0895628088369', '08884860906', '081352358181', '082383432527', '08112134788', '0895343266492', '0895400173300', '081262154210', '081379610811', '081239012750', '081776571980', '08111103306', '081293301919', '0895329522184', '08994696899', '085159080605', '081328419380', '081270743031', '081770170806', '081236156068', '081945795161', '082187213534', '081271930004', '089630329831', '085781126377', '081333634882', '087713370966', '082129516339', '0895704463538', '0895328349956', '085215550208', '087898395595', '081392058055', '085646926754', '089652621999', '08979281507', '085883378555', '085719366206', '081386021318', '081383155846', '08114332006', '087892237739', '0895378835613', '085717190883', '081992285439', '082277387205', '082222208298', '081380261443', '081338051823', '083876613052', '085956229659', '082182368829', '08972106806', '0895328810285', '0895383922055', '081511317505', '0895637170957', '081271674434', '081210463337', '087773679563', '087870107456', '081238155880', '085162595282', '087810198430', '089529733522', '081281218000', '082247546599', '0895636042550', '08973940281', '085333409350', '082145260709', '082234699038', '082255161853', '0895345114308', '081297553335', '085691278596', '082177221718', '089670179129', '087804000571', '081958895242', '083131193235', '081398612805', '089637421580', '081390913384', '08961693698', '0881025532202', '085102758877', '081934304357'];
        $ppti_password_add = ['jak', 'ban', 'sid', 'sur', 'pon', 'med', 'ban', 'tan', 'ban', 'pal', 'pal', 'den', 'ban', 'bog', 'tan', 'mem', 'pad', 'bul', 'mag', 'sem', 'jak', 'jak', 'den', 'tan', 'ban', 'pal', 'bog', 'sur', 'jak', 'ban', 'den', 'jak', 'bog', 'mua', 'ken', 'den', 'bog', 'tan', 'jak', 'bek', 'bog', 'pan', 'man', 'pal', 'pon', 'dep', 'pal', 'med', 'sem', 'bog', 'den', 'jak', 'ban', 'pal', 'sur', 'pur', 'bog', 'bog', 'pal', 'jam', 'jak', 'jak', 'bog', 'kup', 'bog', 'bog', 'jam', 'bat', 'den', 'suk', 'den', 'mat', 'sin', 'sur', 'bul', 'ban', 'tan', 'jak', 'jam', 'pon', 'jak', 'bel', 'ban', 'tan', 'pal', 'sur', 'pon', 'tan', 'pal', 'bli'];
        $departement = Departement::where('name', 'PPBP 7')->first();
        for ($i = 0; $i < 45; $i++) {
            User::create([
                'email' => $ppti_email[$i],
                'name' => $ppti_name[$i],
                'password' => bcrypt($ppti_password_add[$i].$ppti_password[$i]),
                'departement_id' => $departement->id
            ]);
        }
        $departement = Departement::where('name', 'PPBP 8')->first();
        for ($i = 45; $i < 90; $i++) {
            User::create([
                'email' => $ppti_email[$i],
                'name' => $ppti_name[$i],
                'password' => bcrypt($ppti_password_add[$i].$ppti_password[$i]),
                'departement_id' => $departement->id
            ]);
        }

        // delete user with email madewikanta1@gmail.com
        // User::where('email', 'madewikanta1@gmail.com')->delete();
    }
}
