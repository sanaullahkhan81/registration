<?php

use App\Language;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::truncate();
        $languages = array(
            array(
                "name" => "Afrikans",
                "language" => "Afrikanns",
                "code" => "AF"),
            array(
                "name" => "Albanés",
                "language" => "Albanian",
                "code" => "SQ"),
            array(
                "name" => "Árabe",
                "language" => "Arabic",
                "code" => "AR"),
            array(
                "name" => "Armenio",
                "language" => "Armenian",
                "code" => "HY"),
            array(
                "name" => "Vasco",
                "language" => "Basque",
                "code" => "EU"),
            array(
                "name" => "Bengalí",
                "language" => "Bengali",
                "code" => "BN"),
            array(
                "name" => "Búlgaro",
                "language" => "Bulgarian",
                "code" => "BG"),
            array(
                "name" => "Catalán",
                "language" => "Catalan",
                "code" => "CA"),
            array(
                "name" => "Camboyano",
                "language" => "Cambodian",
                "code" => "KM"),
            array(
                "name" => "Chino (Mandarín)",
                "language" => "Chinese (Mandarin)",
                "code" => "ZH"),
            array(
                "name" => "Croata",
                "language" => "Croation",
                "code" => "HR"),
            array(
                "name" => "Checo",
                "language" => "Czech",
                "code" => "CS"),
            array(
                "name" => "Danés",
                "language" => "Danish",
                "code" => "DA"),
            array(
                "name" => "Holandés",
                "language" => "Dutch",
                "code" => "NL"),
            array(
                "name" => "Inglés",
                "language" => "English",
                "code" => "EN"),
            array(
                "name" => "Estonio",
                "language" => "Estonian",
                "code" => "ET"),
            array(
                "name" => "Fiji",
                "language" => "Fiji",
                "code" => "FJ"),
            array(
                "name" => "Finlandés",
                "language" => "Finnish",
                "code" => "FI"),
            array(
                "name" => "Francés",
                "language" => "French",
                "code" => "FR"),
            array(
                "name" => "Georgiano",
                "language" => "Georgian",
                "code" => "KA"),
            array(
                "name" => "Alemán",
                "language" => "German",
                "code" => "DE"),
            array(
                "name" => "Griego",
                "language" => "Greek",
                "code" => "EL"),
            array(
                "name" => "Gujarati",
                "language" => "Gujarati",
                "code" => "GU"),
            array(
                "name" => "Hebreo",
                "language" => "Hebrew",
                "code" => "HE"),
            array(
                "name" => "Hindi",
                "language" => "Hindi",
                "code" => "HI"),
            array(
                "name" => "Húngaro",
                "language" => "Hungarian",
                "code" => "HU"),
            array(
                "name" => "Islandés",
                "language" => "Icelandic",
                "code" => "IS"),
            array(
                "name" => "Indonesio",
                "language" => "Indonesian",
                "code" => "ID"),
            array(
                "name" => "Irlandés",
                "language" => "Irish",
                "code" => "GA"),
            array(
                "name" => "Italiano",
                "language" => "Italian",
                "code" => "IT"),
            array(
                "name" => "Japonés",
                "language" => "Japanese",
                "code" => "JA"),
            array(
                "name" => "Javanés",
                "language" => "Javanese",
                "code" => "JW"),
            array(
                "name" => "Coreano",
                "language" => "Korean",
                "code" => "KO"),
            array(
                "name" => "Latino",
                "language" => "Latin",
                "code" => "LA"),
            array(
                "name" => "Letón",
                "language" => "Latvian",
                "code" => "LV"),
            array(
                "name" => "Lituano",
                "language" => "Lithuanian",
                "code" => "LT"),
            array(
                "name" => "Macedonio",
                "language" => "Macedonian",
                "code" => "MK"),
            array(
                "name" => "Malayo",
                "language" => "Malay",
                "code" => "MS"),
            array(
                "name" => "Malayalam",
                "language" => "Malayalam",
                "code" => "ML"),
            array(
                "name" => "Maltés",
                "language" => "Maltese",
                "code" => "MT"),
            array(
                "name" => "Maorí",
                "language" => "Maori",
                "code" => "MI"),
            array(
                "name" => "Marathi",
                "language" => "Marathi",
                "code" => "MR"),
            array(
                "name" => "Mongol",
                "language" => "Mongolian",
                "code" => "MN"),
            array(
                "name" => "Nepalí",
                "language" => "Nepali",
                "code" => "NE"),
            array(
                "name" => "Noruego",
                "language" => "Norwegian",
                "code" => "NO"),
            array(
                "name" => "Persa",
                "language" => "Persian",
                "code" => "FA"),
            array(
                "name" => "Polaco",
                "language" => "Polish",
                "code" => "PL"),
            array(
                "name" => "Portugués",
                "language" => "Portuguese",
                "code" => "PT"),
            array(
                "name" => "Punjabi",
                "language" => "Punjabi",
                "code" => "PA"),
            array(
                "name" => "Quechua",
                "language" => "Quechua",
                "code" => "QU"),
            array(
                "name" => "Romanian",
                "language" => "Rumano",
                "code" => "RO"),
            array(
                "name" => "Ruso",
                "language" => "Russian",
                "code" => "RU"),
            array(
                "name" => "Samoano",
                "language" => "Samoan",
                "code" => "SM"),
            array(
                "name" => "Serbio",
                "language" => "Serbian",
                "code" => "SR"),
            array(
                "name" => "Eslovaco",
                "language" => "Slovak",
                "code" => "SK"),
            array(
                "name" => "Esloveno",
                "language" => "Slovenian",
                "code" => "SL"),
            array(
                "name" => "Español",
                "language" => "Spanish",
                "code" => "ES"),
            array(
                "name" => "Swahili",
                "language" => "Swahili",
                "code" => "SW"),
            array(
                "name" => "Sueco ",
                "language" => "Swedish ",
                "code" => "SV"),
            array(
                "name" => "Tamil",
                "language" => "Tamil",
                "code" => "TA"),
            array(
                "name" => "Tártaro",
                "language" => "Tatar",
                "code" => "TT"),
            array(
                "name" => "Telugu",
                "language" => "Telugu",
                "code" => "TE"),
            array(
                "name" => "Tailandés",
                "language" => "Thai",
                "code" => "TH"),
            array(
                "name" => "Tibetano",
                "language" => "Tibetan",
                "code" => "BO"),
            array(
                "name" => "Tonga",
                "language" => "Tonga",
                "code" => "TO"),
            array(
                "name" => "Turco",
                "language" => "Turkish",
                "code" => "TR"),
            array(
                "name" => "Ucraniano",
                "language" => "Ukranian",
                "code" => "UK"),
            array(
                "name" => "Urdu",
                "language" => "Urdu",
                "code" => "UR"),
            array(
                "name" => "Uzbek",
                "language" => "Uzbek",
                "code" => "UZ"),
            array(
                "name" => "Vietnamita",
                "language" => "Vietnamese",
                "code" => "VI"),
            array(
                "name" => "Galés",
                "language" => "Welsh",
                "code" => "CY"),
            array(
                "name" => "Xhosa",
                "language" => "Xhosa",
                "code" => "XH"),

        );

        foreach ($languages as $language){
            Language::create([
                'language' => $language['language'],
                'code' => $language['code'],

            ]);
        }

    }
}
