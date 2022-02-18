<?php

namespace App\Models;

use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $countries = [
        ['id' => 1,'code' => 'AF' ,'name' => "Afghanistan",'phonecode' => 93],
        ['id' => 2,'code' => 'AL' ,'name' => "Albania",'phonecode' => 355],
        ['id' => 3,'code' => 'DZ' ,'name' => "Algeria",'phonecode' => 213],
        ['id' => 4,'code' => 'AS' ,'name' => "American Samoa",'phonecode' => 1684],
        ['id' => 5,'code' => 'AD' ,'name' => "Andorra",'phonecode' => 376],
        ['id' => 6,'code' => 'AO' ,'name' => "Angola",'phonecode' => 244],
        ['id' => 7,'code' => 'AI' ,'name' => "Anguilla",'phonecode' => 1264],
        ['id' => 8,'code' => 'AQ' ,'name' => "Antarctica",'phonecode' => 0],
        ['id' => 9,'code' => 'AG' ,'name' => "Antigua And Barbuda",'phonecode' => 1268],
        ['id' => 10,'code' => 'AR','name' => "Argentina",'phonecode' => 54],
        ['id' => 11,'code' => 'AM','name' => "Armenia",'phonecode' => 374],
        ['id' => 12,'code' => 'AW','name' => "Aruba",'phonecode' => 297],
        ['id' => 13,'code' => 'AU','name' => "Australia",'phonecode' => 61],
        ['id' => 14,'code' => 'AT','name' => "Austria",'phonecode' => 43],
        ['id' => 15,'code' => 'AZ','name' => "Azerbaijan",'phonecode' => 994],
        ['id' => 16,'code' => 'BS','name' => "Bahamas The",'phonecode' => 1242],
        ['id' => 17,'code' => 'BH','name' => "Bahrain",'phonecode' => 973],
        ['id' => 18,'code' => 'BD','name' => "Bangladesh",'phonecode' => 880],
        ['id' => 19,'code' => 'BB','name' => "Barbados",'phonecode' => 1246],
        ['id' => 20,'code' => 'BY','name' => "Belarus",'phonecode' => 375],
        ['id' => 21,'code' => 'BE','name' => "Belgium",'phonecode' => 32],
        ['id' => 22,'code' => 'BZ','name' => "Belize",'phonecode' => 501],
        ['id' => 23,'code' => 'BJ','name' => "Benin",'phonecode' => 229],
        ['id' => 24,'code' => 'BM','name' => "Bermuda",'phonecode' => 1441],
        ['id' => 25,'code' => 'BT','name' => "Bhutan",'phonecode' => 975],
        ['id' => 26,'code' => 'BO','name' => "Bolivia",'phonecode' => 591],
        ['id' => 27,'code' => 'BA','name' => "Bosnia and Herzegovina",'phonecode' => 387],
        ['id' => 28,'code' => 'BW','name' => "Botswana",'phonecode' => 267],
        ['id' => 29,'code' => 'BV','name' => "Bouvet Island",'phonecode' => 0],
        ['id' => 30,'code' => 'BR','name' => "Brazil",'phonecode' => 55],
        ['id' => 31,'code' => 'IO','name' => "British Indian Ocean Territory",'phonecode' => 246],
        ['id' => 32,'code' => 'BN','name' => "Brunei",'phonecode' => 673],
        ['id' => 33,'code' => 'BG','name' => "Bulgaria",'phonecode' => 359],
        ['id' => 34,'code' => 'BF','name' => "Burkina Faso",'phonecode' => 226],
        ['id' => 35,'code' => 'BI','name' => "Burundi",'phonecode' => 257],
        ['id' => 36,'code' => 'KH','name' => "Cambodia",'phonecode' => 855],
        ['id' => 37,'code' => 'CM','name' => "Cameroon",'phonecode' => 237],
        ['id' => 38,'code' => 'CA','name' => "Canada",'phonecode' => 1],
        ['id' => 39,'code' => 'CV','name' => "Cape Verde",'phonecode' => 238],
        ['id' => 40,'code' => 'KY','name' => "Cayman Islands",'phonecode' => 1345],
        ['id' => 41,'code' => 'CF','name' => "Central African Republic",'phonecode' => 236],
        ['id' => 42,'code' => 'TD','name' => "Chad",'phonecode' => 235],
        ['id' => 43,'code' => 'CL','name' => "Chile",'phonecode' => 56],
        ['id' => 44,'code' => 'CN','name' => "China",'phonecode' => 86],
        ['id' => 45,'code' => 'CX','name' => "Christmas Island",'phonecode' => 61],
        ['id' => 46,'code' => 'CC','name' => "Cocos (Keeling) Islands",'phonecode' => 672],
        ['id' => 47,'code' => 'CO','name' => "Colombia",'phonecode' => 57],
        ['id' => 48,'code' => 'KM','name' => "Comoros",'phonecode' => 269],
        ['id' => 49,'code' => 'CG','name' => "Congo",'phonecode' => 242],
        ['id' => 50,'code' => 'CD','name' => "Congo The Democratic Republic Of The",'phonecode' => 242],
        ['id' => 51,'code' => 'CK','name' => "Cook Islands",'phonecode' => 682],
        ['id' => 52,'code' => 'CR','name' => "Costa Rica",'phonecode' => 506],
        ['id' => 53,'code' => 'CI','name' => "Cote D Ivoire (Ivory Coast)",'phonecode' => 225],
        ['id' => 54,'code' => 'HR','name' => "Croatia (Hrvatska)",'phonecode' => 385],
        ['id' => 55,'code' => 'CU','name' => "Cuba",'phonecode' => 53],
        ['id' => 56,'code' => 'CY','name' => "Cyprus",'phonecode' => 357],
        ['id' => 57,'code' => 'CZ','name' => "Czech Republic",'phonecode' => 420],
        ['id' => 58,'code' => 'DK','name' => "Denmark",'phonecode' => 45],
        ['id' => 59,'code' => 'DJ','name' => "Djibouti",'phonecode' => 253],
        ['id' => 60,'code' => 'DM','name' => "Dominica",'phonecode' => 1767],
        ['id' => 61,'code' => 'DO','name' => "Dominican Republic",'phonecode' => 1809],
        ['id' => 62,'code' => 'TP','name' => "East Timor",'phonecode' => 670],
        ['id' => 63,'code' => 'EC','name' => "Ecuador",'phonecode' => 593],
        ['id' => 64,'code' => 'EG','name' => "Egypt",'phonecode' => 20],
        ['id' => 65,'code' => 'SV','name' => "El Salvador",'phonecode' => 503],
        ['id' => 66,'code' => 'GQ','name' => "Equatorial Guinea",'phonecode' => 240],
        ['id' => 67,'code' => 'ER','name' => "Eritrea",'phonecode' => 291],
        ['id' => 68,'code' => 'EE','name' => "Estonia",'phonecode' => 372],
        ['id' => 69,'code' => 'ET','name' => "Ethiopia",'phonecode' => 251],
        ['id' => 70,'code' => 'XA','name' => "External Territories of Australia",'phonecode' => 61],
        ['id' => 71,'code' => 'FK','name' => "Falkland Islands",'phonecode' => 500],
        ['id' => 72,'code' => 'FO','name' => "Faroe Islands",'phonecode' => 298],
        ['id' => 73,'code' => 'FJ','name' => "Fiji Islands",'phonecode' => 679],
        ['id' => 74,'code' => 'FI','name' => "Finland",'phonecode' => 358],
        ['id' => 75,'code' => 'FR','name' => "France",'phonecode' => 33],
        ['id' => 76,'code' => 'GF','name' => "French Guiana",'phonecode' => 594],
        ['id' => 77,'code' => 'PF','name' => "French Polynesia",'phonecode' => 689],
        ['id' => 78,'code' => 'TF','name' => "French Southern Territories",'phonecode' => 0],
        ['id' => 79,'code' => 'GA','name' => "Gabon",'phonecode' => 241],
        ['id' => 80,'code' => 'GM','name' => "Gambia The",'phonecode' => 220],
        ['id' => 81,'code' => 'GE','name' => "Georgia",'phonecode' => 995],
        ['id' => 82,'code' => 'DE','name' => "Germany",'phonecode' => 49],
        ['id' => 83,'code' => 'GH','name' => "Ghana",'phonecode' => 233],
        ['id' => 84,'code' => 'GI','name' => "Gibraltar",'phonecode' => 350],
        ['id' => 85,'code' => 'GR','name' => "Greece",'phonecode' => 30],
        ['id' => 86,'code' => 'GL','name' => "Greenland",'phonecode' => 299],
        ['id' => 87,'code' => 'GD','name' => "Grenada",'phonecode' => 1473],
        ['id' => 88,'code' => 'GP','name' => "Guadeloupe",'phonecode' => 590],
        ['id' => 89,'code' => 'GU','name' => "Guam",'phonecode' => 1671],
        ['id' => 90,'code' => 'GT','name' => "Guatemala",'phonecode' => 502],
        ['id' => 91,'code' => 'XU','name' => "Guernsey and Alderney",'phonecode' => 44],
        ['id' => 92,'code' => 'GN','name' => "Guinea",'phonecode' => 224],
        ['id' => 93,'code' => 'GW','name' => "Guinea-Bissau",'phonecode' => 245],
        ['id' => 94,'code' => 'GY','name' => "Guyana",'phonecode' => 592],
        ['id' => 95,'code' => 'HT','name' => "Haiti",'phonecode' => 509],
        ['id' => 96,'code' => 'HM','name' => "Heard and McDonald Islands",'phonecode' => 0],
        ['id' => 97,'code' => 'HN','name' => "Honduras",'phonecode' => 504],
        ['id' => 98,'code' => 'HK','name' => "Hong Kong S.A.R.",'phonecode' => 852],
        ['id' => 99,'code' => 'HU','name' => "Hungary",'phonecode' => 36],
        ['id' => 100,'code' => 'IS','name' => "Iceland",'phonecode' => 354],
        ['id' => 101,'code' => 'IN','name' => "India",'phonecode' => 91],
        ['id' => 102,'code' => 'ID','name' => "Indonesia",'phonecode' => 62],
        ['id' => 103,'code' => 'IR','name' => "Iran",'phonecode' => 98],
        ['id' => 104,'code' => 'IQ','name' => "Iraq",'phonecode' => 964],
        ['id' => 105,'code' => 'IE','name' => "Ireland",'phonecode' => 353],
        ['id' => 106,'code' => 'IL','name' => "Israel",'phonecode' => 972],
        ['id' => 107,'code' => 'IT','name' => "Italy",'phonecode' => 39],
        ['id' => 108,'code' => 'JM','name' => "Jamaica",'phonecode' => 1876],
        ['id' => 109,'code' => 'JP','name' => "Japan",'phonecode' => 81],
        ['id' => 110,'code' => 'XJ','name' => "Jersey",'phonecode' => 44],
        ['id' => 111,'code' => 'JO','name' => "Jordan",'phonecode' => 962],
        ['id' => 112,'code' => 'KZ','name' => "Kazakhstan",'phonecode' => 7],
        ['id' => 113,'code' => 'KE','name' => "Kenya",'phonecode' => 254],
        ['id' => 114,'code' => 'KI','name' => "Kiribati",'phonecode' => 686],
        ['id' => 115,'code' => 'KP','name' => "Korea North",'phonecode' => 850],
        ['id' => 116,'code' => 'KR','name' => "Korea South",'phonecode' => 82],
        ['id' => 117,'code' => 'KW','name' => "Kuwait",'phonecode' => 965],
        ['id' => 118,'code' => 'KG','name' => "Kyrgyzstan",'phonecode' => 996],
        ['id' => 119,'code' => 'LA','name' => "Laos",'phonecode' => 856],
        ['id' => 120,'code' => 'LV','name' => "Latvia",'phonecode' => 371],
        ['id' => 121,'code' => 'LB','name' => "Lebanon",'phonecode' => 961],
        ['id' => 122,'code' => 'LS','name' => "Lesotho",'phonecode' => 266],
        ['id' => 123,'code' => 'LR','name' => "Liberia",'phonecode' => 231],
        ['id' => 124,'code' => 'LY','name' => "Libya",'phonecode' => 218],
        ['id' => 125,'code' => 'LI','name' => "Liechtenstein",'phonecode' => 423],
        ['id' => 126,'code' => 'LT','name' => "Lithuania",'phonecode' => 370],
        ['id' => 127,'code' => 'LU','name' => "Luxembourg",'phonecode' => 352],
        ['id' => 128,'code' => 'MO','name' => "Macau S.A.R.",'phonecode' => 853],
        ['id' => 129,'code' => 'MK','name' => "Macedonia",'phonecode' => 389],
        ['id' => 130,'code' => 'MG','name' => "Madagascar",'phonecode' => 261],
        ['id' => 131,'code' => 'MW','name' => "Malawi",'phonecode' => 265],
        ['id' => 132,'code' => 'MY','name' => "Malaysia",'phonecode' => 60],
        ['id' => 133,'code' => 'MV','name' => "Maldives",'phonecode' => 960],
        ['id' => 134,'code' => 'ML','name' => "Mali",'phonecode' => 223],
        ['id' => 135,'code' => 'MT','name' => "Malta",'phonecode' => 356],
        ['id' => 136,'code' => 'XM','name' => "Man (Isle of)",'phonecode' => 44],
        ['id' => 137,'code' => 'MH','name' => "Marshall Islands",'phonecode' => 692],
        ['id' => 138,'code' => 'MQ','name' => "Martinique",'phonecode' => 596],
        ['id' => 139,'code' => 'MR','name' => "Mauritania",'phonecode' => 222],
        ['id' => 140,'code' => 'MU','name' => "Mauritius",'phonecode' => 230],
        ['id' => 141,'code' => 'YT','name' => "Mayotte",'phonecode' => 269],
        ['id' => 142,'code' => 'MX','name' => "Mexico",'phonecode' => 52],
        ['id' => 143,'code' => 'FM','name' => "Micronesia",'phonecode' => 691],
        ['id' => 144,'code' => 'MD','name' => "Moldova",'phonecode' => 373],
        ['id' => 145,'code' => 'MC','name' => "Monaco",'phonecode' => 377],
        ['id' => 146,'code' => 'MN','name' => "Mongolia",'phonecode' => 976],
        ['id' => 147,'code' => 'MS','name' => "Montserrat",'phonecode' => 1664],
        ['id' => 148,'code' => 'MA','name' => "Morocco",'phonecode' => 212],
        ['id' => 149,'code' => 'MZ','name' => "Mozambique",'phonecode' => 258],
        ['id' => 150,'code' => 'MM','name' => "Myanmar",'phonecode' => 95],
        ['id' => 151,'code' => 'NA','name' => "Namibia",'phonecode' => 264],
        ['id' => 152,'code' => 'NR','name' => "Nauru",'phonecode' => 674],
        ['id' => 153,'code' => 'NP','name' => "Nepal",'phonecode' => 977],
        ['id' => 154,'code' => 'AN','name' => "Netherlands Antilles",'phonecode' => 599],
        ['id' => 155,'code' => 'NL','name' => "Netherlands The",'phonecode' => 31],
        ['id' => 156,'code' => 'NC','name' => "New Caledonia",'phonecode' => 687],
        ['id' => 157,'code' => 'NZ','name' => "New Zealand",'phonecode' => 64],
        ['id' => 158,'code' => 'NI','name' => "Nicaragua",'phonecode' => 505],
        ['id' => 159,'code' => 'NE','name' => "Niger",'phonecode' => 227],
        ['id' => 160,'code' => 'NG','name' => "Nigeria",'phonecode' => 234],
        ['id' => 161,'code' => 'NU','name' => "Niue",'phonecode' => 683],
        ['id' => 162,'code' => 'NF','name' => "Norfolk Island",'phonecode' => 672],
        ['id' => 163,'code' => 'MP','name' => "Northern Mariana Islands",'phonecode' => 1670],
        ['id' => 164,'code' => 'NO','name' => "Norway",'phonecode' => 47],
        ['id' => 165,'code' => 'OM','name' => "Oman",'phonecode' => 968],
        ['id' => 166,'code' => 'PK','name' => "Pakistan",'phonecode' => 92],
        ['id' => 167,'code' => 'PW','name' => "Palau",'phonecode' => 680],
        ['id' => 168,'code' => 'PS','name' => "Palestinian Territory Occupied",'phonecode' => 970],
        ['id' => 169,'code' => 'PA','name' => "Panama",'phonecode' => 507],
        ['id' => 170,'code' => 'PG','name' => "Papua new Guinea",'phonecode' => 675],
        ['id' => 171,'code' => 'PY','name' => "Paraguay",'phonecode' => 595],
        ['id' => 172,'code' => 'PE','name' => "Peru",'phonecode' => 51],
        ['id' => 173,'code' => 'PH','name' => "Philippines",'phonecode' => 63],
        ['id' => 174,'code' => 'PN','name' => "Pitcairn Island",'phonecode' => 0],
        ['id' => 175,'code' => 'PL','name' => "Poland",'phonecode' => 48],
        ['id' => 176,'code' => 'PT','name' => "Portugal",'phonecode' => 351],
        ['id' => 177,'code' => 'PR','name' => "Puerto Rico",'phonecode' => 1787],
        ['id' => 178,'code' => 'QA','name' => "Qatar",'phonecode' => 974],
        ['id' => 179,'code' => 'RE','name' => "Reunion",'phonecode' => 262],
        ['id' => 180,'code' => 'RO','name' => "Romania",'phonecode' => 40],
        ['id' => 181,'code' => 'RU','name' => "Russia",'phonecode' => 70],
        ['id' => 182,'code' => 'RW','name' => "Rwanda",'phonecode' => 250],
        ['id' => 183,'code' => 'SH','name' => "Saint Helena",'phonecode' => 290],
        ['id' => 184,'code' => 'KN','name' => "Saint Kitts And Nevis",'phonecode' => 1869],
        ['id' => 185,'code' => 'LC','name' => "Saint Lucia",'phonecode' => 1758],
        ['id' => 186,'code' => 'PM','name' => "Saint Pierre and Miquelon",'phonecode' => 508],
        ['id' => 187,'code' => 'VC','name' => "Saint Vincent And The Grenadines",'phonecode' => 1784],
        ['id' => 188,'code' => 'WS','name' => "Samoa",'phonecode' => 684],
        ['id' => 189,'code' => 'SM','name' => "San Marino",'phonecode' => 378],
        ['id' => 190,'code' => 'ST','name' => "Sao Tome and Principe",'phonecode' => 239],
        ['id' => 191,'code' => 'SA','name' => "Saudi Arabia",'phonecode' => 966],
        ['id' => 192,'code' => 'SN','name' => "Senegal",'phonecode' => 221],
        ['id' => 193,'code' => 'RS','name' => "Serbia",'phonecode' => 381],
        ['id' => 194,'code' => 'SC','name' => "Seychelles",'phonecode' => 248],
        ['id' => 195,'code' => 'SL','name' => "Sierra Leone",'phonecode' => 232],
        ['id' => 196,'code' => 'SG','name' => "Singapore",'phonecode' => 65],
        ['id' => 197,'code' => 'SK','name' => "Slovakia",'phonecode' => 421],
        ['id' => 198,'code' => 'SI','name' => "Slovenia",'phonecode' => 386],
        ['id' => 199,'code' => 'XG','name' => "Smaller Territories of the UK",'phonecode' => 44],
        ['id' => 200,'code' => 'SB','name' => "Solomon Islands",'phonecode' => 677],
        ['id' => 201,'code' => 'SO','name' => "Somalia",'phonecode' => 252],
        ['id' => 202,'code' => 'ZA','name' => "South Africa",'phonecode' => 27],
        ['id' => 203,'code' => 'GS','name' => "South Georgia",'phonecode' => 0],
        ['id' => 204,'code' => 'SS','name' => "South Sudan",'phonecode' => 211],
        ['id' => 205,'code' => 'ES','name' => "Spain",'phonecode' => 34],
        ['id' => 206,'code' => 'LK','name' => "Sri Lanka",'phonecode' => 94],
        ['id' => 207,'code' => 'SD','name' => "Sudan",'phonecode' => 249],
        ['id' => 208,'code' => 'SR','name' => "Suriname",'phonecode' => 597],
        ['id' => 209,'code' => 'SJ','name' => "Svalbard And Jan Mayen Islands",'phonecode' => 47],
        ['id' => 210,'code' => 'SZ','name' => "Swaziland",'phonecode' => 268],
        ['id' => 211,'code' => 'SE','name' => "Sweden",'phonecode' => 46],
        ['id' => 212,'code' => 'CH','name' => "Switzerland",'phonecode' => 41],
        ['id' => 213,'code' => 'SY','name' => "Syria",'phonecode' => 963],
        ['id' => 214,'code' => 'TW','name' => "Taiwan",'phonecode' => 886],
        ['id' => 215,'code' => 'TJ','name' => "Tajikistan",'phonecode' => 992],
        ['id' => 216,'code' => 'TZ','name' => "Tanzania",'phonecode' => 255],
        ['id' => 217,'code' => 'TH','name' => "Thailand",'phonecode' => 66],
        ['id' => 218,'code' => 'TG','name' => "Togo",'phonecode' => 228],
        ['id' => 219,'code' => 'TK','name' => "Tokelau",'phonecode' => 690],
        ['id' => 220,'code' => 'TO','name' => "Tonga",'phonecode' => 676],
        ['id' => 221,'code' => 'TT','name' => "Trinidad And Tobago",'phonecode' => 1868],
        ['id' => 222,'code' => 'TN','name' => "Tunisia",'phonecode' => 216],
        ['id' => 223,'code' => 'TR','name' => "Turkey",'phonecode' => 90],
        ['id' => 224,'code' => 'TM','name' => "Turkmenistan",'phonecode' => 7370],
        ['id' => 225,'code' => 'TC','name' => "Turks And Caicos Islands",'phonecode' => 1649],
        ['id' => 226,'code' => 'TV','name' => "Tuvalu",'phonecode' => 688],
        ['id' => 227,'code' => 'UG','name' => "Uganda",'phonecode' => 256],
        ['id' => 228,'code' => 'UA','name' => "Ukraine",'phonecode' => 380],
        ['id' => 229,'code' => 'AE','name' => "United Arab Emirates",'phonecode' => 971],
        ['id' => 230,'code' => 'GB','name' => "United Kingdom",'phonecode' => 44],
        ['id' => 231,'code' => 'US','name' => "United States",'phonecode' => 1],
        ['id' => 232,'code' => 'UM','name' => "United States Minor Outlying Islands",'phonecode' => 1],
        ['id' => 233,'code' => 'UY','name' => "Uruguay",'phonecode' => 598],
        ['id' => 234,'code' => 'UZ','name' => "Uzbekistan",'phonecode' => 998],
        ['id' => 235,'code' => 'VU','name' => "Vanuatu",'phonecode' => 678],
        ['id' => 236,'code' => 'VA','name' => "Vatican City State (Holy See)",'phonecode' => 39],
        ['id' => 237,'code' => 'VE','name' => "Venezuela",'phonecode' => 58],
        ['id' => 238,'code' => 'VN','name' => "Vietnam",'phonecode' => 84],
        ['id' => 239,'code' => 'VG','name' => "Virgin Islands (British)",'phonecode' => 1284],
        ['id' => 240,'code' => 'VI','name' => "Virgin Islands (US)",'phonecode' => 1340],
        ['id' => 241,'code' => 'WF','name' => "Wallis And Futuna Islands",'phonecode' => 681],
        ['id' => 242,'code' => 'EH','name' => "Western Sahara",'phonecode' => 212],
        ['id' => 243,'code' => 'YE','name' => "Yemen",'phonecode' => 967],
        ['id' => 244,'code' => 'YU','name' => "Yugoslavia",'phonecode' => 38],
        ['id' => 245,'code' => 'ZM','name' => "Zambia",'phonecode' => 260],
        ['id' => 246,'code' => 'ZW','name' => "Zimbabwe",'phonecode' => 263],
    ];

    // Users relationship with Investments.
    public function investments()
    {
        return $this->hasMany(Investment::class);
    }
    // Users relationships with wallets
    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }
    // Users relationships with transactions
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    // Users relationships with Bank Accounts.
    public function bankAccounts()
    {
        return $this->hasMany(BankAccounts::class);
    }
    // Users relationships with Documents.
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
    public function referrals(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Referral::class, 'referee_id');
    }

    public function payments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OnlinePayment::class);
    }

    public function getNameAttribute()
    {
        return $this->first_name . ' ' .$this->last_name;
    }

    public static function generateUserCode()
    {
        $str = "";
        do {
            $str = Str::random(10);
        } while (parent::where('code', $str)->count() > 0);
        return $str;
    }

    public function hasSufficientBalanceForTransaction($amount)
    {
        return $this->wallet->balance >= $amount;
    }
}
