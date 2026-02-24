<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="DevEvil Search is a fast, simple, open-source search engine designed to provide lightning-quick results while ensuring user privacy.">
    <meta name="keywords"
        content="devevil search, dev evil search, search, search engine, private search engine, ai, private, fast search engine, google, devevil, dev evil, dev, evil, developer, freelance, devevil99, devevil021, devevil themes, devevil universe, universe, dev evil universe, web designer, website developer, web developer, website designer">
    <meta name="author" content="DevEvil Search">
    <meta name="robots" content="index, follow">

    <title>Search results for "<?php echo htmlspecialchars($_GET['q']); ?>" - DevEvil Search</title>

    <link rel="icon" href="./img/logo.png" type="image/x-icon">

    <meta property="og:title" content="DevEvil Search">
    <meta property="og:description"
        content="DevEvil Search is a fast, simple, open-source search engine designed to provide lightning-quick results while ensuring user privacy.">
    <meta property="og:image" content="https://search.devevil.com/img/logo.png">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="DevEvil Search">
    <meta name="theme-color" content="#5F22D9">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DevEvil Search">
    <meta name="twitter:description"
        content="DevEvil Search is a fast, simple, open-source search engine designed to provide lightning-quick results while ensuring user privacy.">
    <meta name="twitter:image" content="https://search.devevil.com/img/logo.png">

    <link rel="stylesheet" href="./css/result.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <script data-host="https://analytics.devevil.com" data-dnt="false" src="https://analytics.devevil.com/js/script.js"
        id="ZwSg9rf6GA" async defer></script>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <nav>
        <form style="width: 100%;" action="./search" method="GET" autocomplete="off">
            <div class="input-container">
                <input type="text" class="search-input" id="search-input" name="q" value="" required>
                <input type="hidden" name="safe" id="safeInput" value="active">
                <input type="hidden" name="cr" id="locInput" value="countryUS">
                <input type="hidden" id="aiEnabled" name="ai" value="true">
                <button type="submit" class="search-button">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>

        <div class="right">
            <i class="fas fa-cog" id="settingsCog"></i>
            <div class="dropdown" id="dropdownMenu">
                <div class="dropdown-section">
                    <h4>Search Region</h4>
                    <div>
                        <p>Region</p>
                        <select name="location">
                            <option value="countryUS">United States</option>
                            <option value="countryAF">Afghanistan</option>
                            <option value="countryAL">Albania</option>
                            <option value="countryDZ">Algeria</option>
                            <option value="countryAS">American Samoa</option>
                            <option value="countryAD">Andorra</option>
                            <option value="countryAO">Angola</option>
                            <option value="countryAI">Anguilla</option>
                            <option value="countryAQ">Antarctica</option>
                            <option value="countryAG">Antigua and Barbuda</option>
                            <option value="countryAR">Argentina</option>
                            <option value="countryAM">Armenia</option>
                            <option value="countryAW">Aruba</option>
                            <option value="countryAU">Australia</option>
                            <option value="countryAT">Austria</option>
                            <option value="countryAZ">Azerbaijan</option>
                            <option value="countryBS">Bahamas</option>
                            <option value="countryBH">Bahrain</option>
                            <option value="countryBD">Bangladesh</option>
                            <option value="countryBB">Barbados</option>
                            <option value="countryBY">Belarus</option>
                            <option value="countryBE">Belgium</option>
                            <option value="countryBZ">Belize</option>
                            <option value="countryBJ">Benin</option>
                            <option value="countryBM">Bermuda</option>
                            <option value="countryBT">Bhutan</option>
                            <option value="countryBO">Bolivia</option>
                            <option value="countryBA">Bosnia and Herzegovina</option>
                            <option value="countryBW">Botswana</option>
                            <option value="countryBV">Bouvet Island</option>
                            <option value="countryBR">Brazil</option>
                            <option value="countryIO">British Indian Ocean Territory</option>
                            <option value="countryBN">Brunei Darussalam</option>
                            <option value="countryBG">Bulgaria</option>
                            <option value="countryBF">Burkina Faso</option>
                            <option value="countryBI">Burundi</option>
                            <option value="countryKH">Cambodia</option>
                            <option value="countryCM">Cameroon</option>
                            <option value="countryCA">Canada</option>
                            <option value="countryCV">Cape Verde</option>
                            <option value="countryKY">Cayman Islands</option>
                            <option value="countryCF">Central African Republic</option>
                            <option value="countryTD">Chad</option>
                            <option value="countryCL">Chile</option>
                            <option value="countryCN">China</option>
                            <option value="countryCX">Christmas Island</option>
                            <option value="countryCC">Cocos (Keeling) Islands</option>
                            <option value="countryCO">Colombia</option>
                            <option value="countryKM">Comoros</option>
                            <option value="countryCG">Congo</option>
                            <option value="countryCD">Congo, the Democratic Republic of</option>
                            <option value="countryCK">Cook Islands</option>
                            <option value="countryCR">Costa Rica</option>
                            <option value="countryCI">Cote D'ivoire</option>
                            <option value="countryHR">Croatia</option>
                            <option value="countryCU">Cuba</option>
                            <option value="countryCY">Cyprus</option>
                            <option value="countryCZ">Czech Republic</option>
                            <option value="countryDK">Denmark</option>
                            <option value="countryDJ">Djibouti</option>
                            <option value="countryDM">Dominica</option>
                            <option value="countryDO">Dominican Republic</option>
                            <option value="countryEC">Ecuador</option>
                            <option value="countryEG">Egypt</option>
                            <option value="countrySV">El Salvador</option>
                            <option value="countryGQ">Equatorial Guinea</option>
                            <option value="countryER">Eritrea</option>
                            <option value="countryEE">Estonia</option>
                            <option value="countryET">Ethiopia</option>
                            <option value="countryFK">Falkland Islands (Malvinas)</option>
                            <option value="countryFO">Faroe Islands</option>
                            <option value="countryFJ">Fiji</option>
                            <option value="countryFI">Finland</option>
                            <option value="countryFR">France</option>
                            <option value="countryGF">French Guiana</option>
                            <option value="countryPF">French Polynesia</option>
                            <option value="countryTF">French Southern Territories</option>
                            <option value="countryGA">Gabon</option>
                            <option value="countryGM">Gambia</option>
                            <option value="countryGE">Georgia</option>
                            <option value="countryDE">Germany</option>
                            <option value="countryGH">Ghana</option>
                            <option value="countryGI">Gibraltar</option>
                            <option value="countryGR">Greece</option>
                            <option value="countryGL">Greenland</option>
                            <option value="countryGD">Grenada</option>
                            <option value="countryGP">Guadeloupe</option>
                            <option value="countryGU">Guam</option>
                            <option value="countryGT">Guatemala</option>
                            <option value="countryGN">Guinea</option>
                            <option value="countryGW">Guinea-Bissau</option>
                            <option value="countryGY">Guyana</option>
                            <option value="countryHT">Haiti</option>
                            <option value="countryHM">Heard Island and Mcdonald Islands</option>
                            <option value="countryVA">Holy See (Vatican City State)</option>
                            <option value="countryHN">Honduras</option>
                            <option value="countryHK">Hong Kong</option>
                            <option value="countryHU">Hungary</option>
                            <option value="countryIS">Iceland</option>
                            <option value="countryIN">India</option>
                            <option value="countryID">Indonesia</option>
                            <option value="countryIR">Iran, Islamic Republic of</option>
                            <option value="countryIQ">Iraq</option>
                            <option value="countryIE">Ireland</option>
                            <option value="countryIL">Israel</option>
                            <option value="countryIT">Italy</option>
                            <option value="countryJM">Jamaica</option>
                            <option value="countryJP">Japan</option>
                            <option value="countryJO">Jordan</option>
                            <option value="countryKZ">Kazakhstan</option>
                            <option value="countryKE">Kenya</option>
                            <option value="countryKI">Kiribati</option>
                            <option value="countryKP">Korea, Democratic People's Republic of</option>
                            <option value="countryKR">Korea, Republic of</option>
                            <option value="countryKW">Kuwait</option>
                            <option value="countryKG">Kyrgyzstan</option>
                            <option value="countryLA">Lao People's Democratic Republic</option>
                            <option value="countryLV">Latvia</option>
                            <option value="countryLB">Lebanon</option>
                            <option value="countryLS">Lesotho</option>
                            <option value="countryLR">Liberia</option>
                            <option value="countryLY">Libyan Arab Jamahiriya</option>
                            <option value="countryLI">Liechtenstein</option>
                            <option value="countryLT">Lithuania</option>
                            <option value="countryLU">Luxembourg</option>
                            <option value="countryMO">Macao</option>
                            <option value="countryMK">Macedonia, the Former Yugoslav Republic of</option>
                            <option value="countryMG">Madagascar</option>
                            <option value="countryMW">Malawi</option>
                            <option value="countryMY">Malaysia</option>
                            <option value="countryMV">Maldives</option>
                            <option value="countryML">Mali</option>
                            <option value="countryMT">Malta</option>
                            <option value="countryMH">Marshall Islands</option>
                            <option value="countryMQ">Martinique</option>
                            <option value="countryMR">Mauritania</option>
                            <option value="countryMU">Mauritius</option>
                            <option value="countryYT">Mayotte</option>
                            <option value="countryMX">Mexico</option>
                            <option value="countryFM">Micronesia, Federated States of</option>
                            <option value="countryMD">Moldova, Republic of</option>
                            <option value="countryMC">Monaco</option>
                            <option value="countryMN">Mongolia</option>
                            <option value="countryMS">Montserrat</option>
                            <option value="countryMA">Morocco</option>
                            <option value="countryMZ">Mozambique</option>
                            <option value="countryMM">Myanmar</option>
                            <option value="countryNA">Namibia</option>
                            <option value="countryNR">Nauru</option>
                            <option value="countryNP">Nepal</option>
                            <option value="countryNL">Netherlands</option>
                            <option value="countryAN">Netherlands Antilles</option>
                            <option value="countryNC">New Caledonia</option>
                            <option value="countryNZ">New Zealand</option>
                            <option value="countryNI">Nicaragua</option>
                            <option value="countryNE">Niger</option>
                            <option value="countryNG">Nigeria</option>
                            <option value="countryNU">Niue</option>
                            <option value="countryNF">Norfolk Island</option>
                            <option value="countryMP">Northern Mariana Islands</option>
                            <option value="countryNO">Norway</option>
                            <option value="countryOM">Oman</option>
                            <option value="countryPK">Pakistan</option>
                            <option value="countryPW">Palau</option>
                            <option value="countryPS">Palestine</option>
                            <option value="countryPA">Panama</option>
                            <option value="countryPG">Papua New Guinea</option>
                            <option value="countryPY">Paraguay</option>
                            <option value="countryPE">Peru</option>
                            <option value="countryPH">Philippines</option>
                            <option value="countryPN">Pitcairn</option>
                            <option value="countryPL">Poland</option>
                            <option value="countryPT">Portugal</option>
                            <option value="countryPR">Puerto Rico</option>
                            <option value="countryQA">Qatar</option>
                            <option value="countryRE">Reunion</option>
                            <option value="countryRO">Romania</option>
                            <option value="countryRU">Russian Federation</option>
                            <option value="countryRW">Rwanda</option>
                            <option value="countrySH">Saint Helena</option>
                            <option value="countryKN">Saint Kitts and Nevis</option>
                            <option value="countryLC">Saint Lucia</option>
                            <option value="countryPM">Saint Pierre and Miquelon</option>
                            <option value="countryVC">Saint Vincent and the Grenadines</option>
                            <option value="countryWS">Samoa</option>
                            <option value="countrySM">San Marino</option>
                            <option value="countryST">Sao Tome and Principe</option>
                            <option value="countrySA">Saudi Arabia</option>
                            <option value="countrySN">Senegal</option>
                            <option value="countryCS">Serbia and Montenegro</option>
                            <option value="countrySC">Seychelles</option>
                            <option value="countrySL">Sierra Leone</option>
                            <option value="countrySG">Singapore</option>
                            <option value="countrySK">Slovakia</option>
                            <option value="countrySI">Slovenia</option>
                            <option value="countrySB">Solomon Islands</option>
                            <option value="countrySO">Somalia</option>
                            <option value="countryZA">South Africa</option>
                            <option value="countryGS">South Georgia and the South Sandwich Islands</option>
                            <option value="countryES">Spain</option>
                            <option value="countryLK">Sri Lanka</option>
                            <option value="countrySD">Sudan</option>
                            <option value="countrySR">Suriname</option>
                            <option value="countrySJ">Svalbard and Jan Mayen</option>
                            <option value="countrySZ">Swaziland</option>
                            <option value="countrySE">Sweden</option>
                            <option value="countryCH">Switzerland</option>
                            <option value="countrySY">Syria</option>
                            <option value="countryTW">Taiwan, Province of China</option>
                            <option value="countryTJ">Tajikistan</option>
                            <option value="countryTZ">Tanzania, United Republic of</option>
                            <option value="countryTH">Thailand</option>
                            <option value="countryTL">Timor-Leste</option>
                            <option value="countryTG">Togo</option>
                            <option value="countryTK">Tokelau</option>
                            <option value="countryTO">Tonga</option>
                            <option value="countryTT">Trinidad and Tobago</option>
                            <option value="countryTN">Tunisia</option>
                            <option value="countryTR">Turkey</option>
                            <option value="countryTM">Turkmenistan</option>
                            <option value="countryTC">Turks and Caicos Islands</option>
                            <option value="countryTV">Tuvalu</option>
                            <option value="countryUG">Uganda</option>
                            <option value="countryUA">Ukraine</option>
                            <option value="countryAE">United Arab Emirates</option>
                            <option value="countryGB">United Kingdom</option>
                            <option value="countryUY">Uruguay</option>
                            <option value="countryUZ">Uzbekistan</option>
                            <option value="countryVU">Vanuatu</option>
                            <option value="countryVE">Venezuela</option>
                            <option value="countryVN">Vietnam</option>
                            <option value="countryVG">Virgin Islands, British</option>
                            <option value="countryVI">Virgin Islands, U.S.</option>
                            <option value="countryWF">Wallis and Futuna</option>
                            <option value="countryEH">Western Sahara</option>
                            <option value="countryYE">Yemen</option>
                            <option value="countryZM">Zambia</option>
                            <option value="countryZW">Zimbabwe</option>
                        </select>
                    </div>
                </div>

                <div class="dropdown-section">
                    <h4>Search Preferences</h4>
                    <div>
                        <p>Theme</p>
                        <div class="theme-toggle" id="themeToggle">
                            <i class="fas fa-moon active"></i>
                            <i class="fas fa-brightness"></i>
                        </div>
                    </div>
                    <div>
                        <p>Safe search</p>
                        <select name="safeSearch">
                            <option value="active">Active</option>
                            <option value="off">Off</option>
                        </select>
                    </div>
                </div>

                <div class="dropdown-footer">
                    <a href="https://devevil.com" target="_blank">© <?php echo date("Y") ?> DevEvil Universe</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="tabs">
        <a href="#" title="All" id="all-tab"><svg class="w-[20px] h-[20px] text-gray-800 dark:text-white"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                    d="M4.37 7.657c2.063.528 2.396 2.806 3.202 3.87 1.07 1.413 2.075 1.228 3.192 2.644 1.805 2.289 1.312 5.705 1.312 6.705M20 15h-1a4 4 0 0 0-4 4v1M8.587 3.992c0 .822.112 1.886 1.515 2.58 1.402.693 2.918.351 2.918 2.334 0 .276 0 2.008 1.972 2.008 2.026.031 2.026-1.678 2.026-2.008 0-.65.527-.9 1.177-.9H20M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </a>
        <a href="#" title="Images" id="images-tab"><svg class="w-[20px] h-[20px] text-gray-800 dark:text-white"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m3 16 5-7 6 6.5m6.5 2.5L16 13l-4.286 6M14 10h.01M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
            </svg>
        </a>
        <a href="#" title="Videos" id="videos-tab"><svg class="w-[20px] h-[20px] text-gray-800 dark:text-white"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M14 6H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1Zm7 11-6-2V9l6-2v10Z" />
            </svg>
        </a>
        <a href="#" title="News" id="news-tab"><svg class="w-[20px] h-[20px] text-gray-800 dark:text-white"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 7h1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h11.5M7 14h6m-6 3h6m0-10h.5m-.5 3h.5M7 7h3v3H7V7Z" />
            </svg>
        </a>
    </div>

    <div class="results-container">
        <div class="results-main">
            <div id="definition-panel"></div>
            <div id="results"></div>
        </div>
        <div id="knowledge-panel"></div>
    </div>

    <script src="./js/script.js?v=<?php echo time(); ?>"></script>
    <script src="js/index.js?v=<?php echo time(); ?>"></script>
    <script src="js/safesearch.js?v=<?php echo time(); ?>"></script>
</body>


</html>
