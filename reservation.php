<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style\reservation.css">
    <script src="Script\reservations.js"></script>
</head>
<body>
    <?php include 'header.inc.php'; ?>
    <?php include 'footer.inc.php'; ?>
    <div class="css-1t8l2ta">
        <label for="languageSelector" class="css-1kff492 e1t160053">
            <div class="e1t160050 css-j82l06-container">
                <span aria-live="polite" aria-atomic="false" aria-relevant="additions text" class="css-7pg0cj-a11yText"></span>
                <div class="chili-single-select__control css-yk16xz-control">
                    <div class="chili-single-select__value-container chili-single-select__value-container--has-value css-1hwfws3">
                        <div class="chili-single-select__single-value css-1uccc91-singleValue">FR</div>
                        <input id="languageSelector" readonly="" tabindex="0" value="" aria-autocomplete="list" class="css-62g3xt-dummyInput">
                    </div>
                    <div class="chili-single-select__indicators css-1wy0on6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true" focusable="false" class="e1url9iy0 css-5kbs43 eahshed0">
                            <path fill-rule="evenodd" d="M11.322 18.32 5.096 7.114A.75.75 0 0 1 5.752 6h12.45a.75.75 0 0 1 .656 1.114L12.633 18.32a.75.75 0 0 1-1.311 0"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </label>
    </div>
    <div class="css-18hbmfj">
        <div class="css-f49pmq">
            <div class="css-s5jzo7">
                <div data-testid="no-coupon"></div>
                <div class="css-1xvf9p0">
                    <button aria-selected="false" data-testid="filter-button-dhp-pax" class="css-rrqi39 ektx8jp0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true" focusable="false" data-testid="person-icon" class="css-p3qwn0 e78l98l0">
                        <g fill-rule="evenodd">
                        <path d="M9 6c0-1.654 1.346-3 3-3s3 1.346 3 3v2.25c0 1.654-1.346 3-3 3s-3-1.346-3-3V6Zm3 6.75c2.481 0 4.5-2.019 4.5-4.5V6c0-2.481-2.019-4.5-4.5-4.5A4.505 4.505 0 0 0 7.5 6v2.25c0 2.481 2.019 4.5 4.5 4.5Z"></path>
                        <path d="M15.75 15h-7.5a6.756 6.756 0 0 0-6.75 6.75.75.75 0 0 0 1.5 0 5.256 5.256 0 0 1 5.25-5.25h7.5A5.256 5.256 0 0 1 21 21.75a.75.75 0 0 0 1.5 0A6.756 6.756 0 0 0 15.75 15"></path>
                        </g>
                        </svg>
                        <div class="css-1ygkeox">2 pers.</div>
                    </button>
                    <div class="css-1w74tai"></div>
                    <button aria-selected="false" data-testid="filter-button-dhp-date" class="css-rrqi39 ektx8jp0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true" focusable="false" data-testid="calendar-icon" class="css-p3qwn0 ez65q8f0">
                        <g fill-rule="evenodd">
                        <path d="M17.25.75a.75.75 0 0 1 .75.75V3h3.75a.75.75 0 0 1 .75.75v18a.75.75 0 0 1-.75.75H2.25a.75.75 0 0 1-.75-.75v-18A.75.75 0 0 1 2.25 3H6V1.5a.75.75 0 0 1 1.5 0V3h9V1.5a.75.75 0 0 1 .75-.75ZM21 9H3v12h18V9ZM6 4.5H3v3h18v-3h-3v.75a.75.75 0 0 1-1.5 0V4.5h-9v.75a.75.75 0 0 1-1.5 0V4.5Z"></path><path d="M8.25 16.5a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1 0-1.5h1.5Zm9 0a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1 0-1.5h1.5Zm-4.5 0a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1 0-1.5h1.5ZM8.25 13a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1 0-1.5h1.5Zm9 0a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1 0-1.5h1.5Zm-4.5 0a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1 0-1.5h1.5Z"></path></g></svg><div class="css-1ygkeox">Aujourd'hui</div></button><div class="css-1w74tai"></div><button aria-selected="false" data-testid="filter-button-dhp-hour" class="css-rrqi39 ektx8jp0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true" focusable="false" data-testid="clock-icon" class="css-p3qwn0 e21uslf0"><g fill-rule="evenodd"><path fill-rule="nonzero" d="M15.53 14.47a.75.75 0 0 1-1.06 1.06l-3-3a.75.75 0 0 1-.22-.53V6a.75.75 0 1 1 1.5 0v5.69l2.78 2.78Z"></path><path d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9m0 19.5C6.21 22.5 1.5 17.79 1.5 12S6.21 1.5 12 1.5 22.5 6.21 22.5 12 17.79 22.5 12 22.5"></path></g></svg><div class="css-1ygkeox">19:00</div></button></div><div class="css-1ago99h"><div class="css-8ilccg"><button data-testid="search-button" class="css-1x881df ektx8jp0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true" focusable="false" class="css-p3qwn0 e16dvmb80"><path fill-rule="evenodd" d="M9 15c-3.309 0-6-2.691-6-6 0-3.308 2.691-6 6-6s6 2.692 6 6c0 3.309-2.691 6-6 6m13.28 5.937-7.353-7.353A7.462 7.462 0 0 0 16.5 9 7.5 7.5 0 1 0 9 16.5a7.46 7.46 0 0 0 4.896-1.826l7.324 7.324c.146.147.338.22.53.22a.75.75 0 0 0 .53-1.281">  
                        </path>
                        </svg> <!-- -->Trouver une table
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>