<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.2.1.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.2.1.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">

            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>

    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
        <li class="tocify-item level-1 back-link">
            <a href="{{ route('pdf.tools') }}" class="text-blue-600 hover:underline">
                ← back to MyAB PDF
            </a>
        </li>
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETregister">
                                <a href="#endpoints-GETregister">Display the registration view.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTregister">
                                <a href="#endpoints-POSTregister">Handle an incoming registration request.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETlogin">
                                <a href="#endpoints-GETlogin">Display the login view.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTlogin">
                                <a href="#endpoints-POSTlogin">Handle an incoming authentication request.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETforgot-password">
                                <a href="#endpoints-GETforgot-password">Display the password reset link request view.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTforgot-password">
                                <a href="#endpoints-POSTforgot-password">Handle an incoming password reset link request.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETreset-password--token-">
                                <a href="#endpoints-GETreset-password--token-">Display the password reset view.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTreset-password">
                                <a href="#endpoints-POSTreset-password">Handle an incoming new password request.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-user-authentication" class="tocify-header">
                <li class="tocify-item level-1" data-unique="user-authentication">
                    <a href="#user-authentication">User authentication</a>
                </li>
                                    <ul id="tocify-subheader-user-authentication" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="user-authentication-POSTapi-pdf-merge">
                                <a href="#user-authentication-POSTapi-pdf-merge">POST api/pdf/merge</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-authentication-POSTapi-pdf-split">
                                <a href="#user-authentication-POSTapi-pdf-split">POST api/pdf/split</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-authentication-POSTapi-pdf-unlock">
                                <a href="#user-authentication-POSTapi-pdf-unlock">POST api/pdf/unlock</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-authentication-POSTapi-pdf-lock">
                                <a href="#user-authentication-POSTapi-pdf-lock">POST api/pdf/lock</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-authentication-POSTapi-pdf-rotate">
                                <a href="#user-authentication-POSTapi-pdf-rotate">POST api/pdf/rotate</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-authentication-POSTapi-pdf-removePage">
                                <a href="#user-authentication-POSTapi-pdf-removePage">POST api/pdf/removePage</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-authentication-POSTapi-pdf-extractPage">
                                <a href="#user-authentication-POSTapi-pdf-extractPage">POST api/pdf/extractPage</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-authentication-POSTapi-pdf-numberPages">
                                <a href="#user-authentication-POSTapi-pdf-numberPages">POST api/pdf/numberPages</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-authentication-POSTapi-pdf-create">
                                <a href="#user-authentication-POSTapi-pdf-create">POST api/pdf/create</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="user-authentication-POSTapi-pdf-addWatermark">
                                <a href="#user-authentication-POSTapi-pdf-addWatermark">POST api/pdf/addWatermark</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: May 22, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {token}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your profile and clicking <b>Generate API token</b>.</p>

        <h1 id="endpoints">Endpoints</h1>



                                <h2 id="endpoints-GETregister">Display the registration view.</h2>

<p>
</p>



<span id="example-requests-GETregister">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETregister">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6IkErUUdyeFRJa015bGlvcFJ4ZjRqRUE9PSIsInZhbHVlIjoiUlNybTNLZmNObWhhYzVFK1ZJSnN0RXZWa2NaQ2Qxalg5dzIzZ1RnYTFNN1ZYNnZacGRFT3JWZDdYRWE3cnVDeFA1YmZLcnEvZUJhT0x6b2tWRGhrYTZXNUpSeFBhekszTkNvM3ErZzBpUWtzRmxxbUpEY3Y3WVpYWms5SzFXQkciLCJtYWMiOiIxZTQyNDkwYWFmM2RkMzllZmYyYTg2YzllY2QyOWRkZGQ2MDljMmVhYjNkMDg1NDVmZTllNDJiOTExOTlkMzIyIiwidGFnIjoiIn0%3D; expires=Thu, 22 May 2025 14:53:48 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6InFEZlBWWU5pWHdUbS9kaXdrUStRQmc9PSIsInZhbHVlIjoienZtME90NlBHaE54QnZReG5IQjRFSGdmV3RqOC9jWUR1VWN2dXBIT1FuUUZwSVFsVS83cy9kblQ0Rnh4bXA5aWE4WFR2SDg0L0l1WEVQVUM4Wk1iKzY3QzNxLzZEazhwNTlYQ3ZhL0N5N1ZER3RMalhmTFhjaWQ4VFBiVGFSL3EiLCJtYWMiOiIxMjE0M2Y2YTA4N2RiNzQzNWY5MWQyMjhjYmJmMjY0ODNiMjYwNjQwYjM5ZWZmMzkyMjg3Zjk4ZTc5NDBjZTc4IiwidGFnIjoiIn0%3D; expires=Thu, 22 May 2025 14:53:48 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;utf-8&quot;&gt;
        &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;
        &lt;meta name=&quot;csrf-token&quot; content=&quot;SpT1KDDqw05ZSnNoF6uIAx4NIfeyxzDb4fPjk0Mg&quot;&gt;

        &lt;title&gt;Laravel&lt;/title&gt;

        &lt;!-- Fonts --&gt;
        &lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.bunny.net&quot;&gt;
        &lt;link href=&quot;https://fonts.bunny.net/css?family=figtree:400,500,600&amp;display=swap&quot; rel=&quot;stylesheet&quot; /&gt;

        &lt;!-- Scripts --&gt;
        &lt;link rel=&quot;preload&quot; as=&quot;style&quot; href=&quot;http://localhost/build/assets/app-CVatbMnu.css&quot; /&gt;&lt;link rel=&quot;modulepreload&quot; href=&quot;http://localhost/build/assets/app-Bf4POITK.js&quot; /&gt;&lt;link rel=&quot;stylesheet&quot; href=&quot;http://localhost/build/assets/app-CVatbMnu.css&quot; /&gt;&lt;script type=&quot;module&quot; src=&quot;http://localhost/build/assets/app-Bf4POITK.js&quot;&gt;&lt;/script&gt;    &lt;/head&gt;
    &lt;body class=&quot;font-sans text-gray-900 antialiased&quot;&gt;
        &lt;div class=&quot;min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100&quot;&gt;
            &lt;div x-data=&quot;{ open: false }&quot; class=&quot;language-switcher relative inline-block text-left&quot;&gt;
    &lt;button
        @click=&quot;open = !open&quot;
        type=&quot;button&quot;
        class=&quot;inline-flex items-center px-3 py-2 border border-gray-300 bg-white text-sm font-medium rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500&quot;
        aria-haspopup=&quot;true&quot;
        :aria-expanded=&quot;open&quot;
    &gt;
        &lt;span class=&quot;mr-2&quot;&gt;🇬🇧&lt;/span&gt;

        &lt;svg class=&quot;ml-2 h-4 w-4 text-gray-500&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; fill=&quot;none&quot; viewBox=&quot;0 0 20 20&quot;&gt;
            &lt;path stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot;
                  d=&quot;M6 8l4 4 4-4&quot;/&gt;
        &lt;/svg&gt;
    &lt;/button&gt;
    &lt;div
        x-show=&quot;open&quot;
        @click.away=&quot;open = false&quot;
        x-transition:enter=&quot;transition ease-out duration-100&quot;
        x-transition:enter-start=&quot;transform opacity-0 scale-95&quot;
        x-transition:enter-end=&quot;transform opacity-100 scale-100&quot;
        x-transition:leave=&quot;transition ease-in duration-75&quot;
        x-transition:leave-start=&quot;transform opacity-100 scale-100&quot;
        x-transition:leave-end=&quot;transform opacity-0 scale-95&quot;
        class=&quot;origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50&quot;
        style=&quot;display: none;&quot;
    &gt;
        &lt;form action=&quot;http://localhost/language-switch&quot; method=&quot;POST&quot;&gt;
            &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;SpT1KDDqw05ZSnNoF6uIAx4NIfeyxzDb4fPjk0Mg&quot; autocomplete=&quot;off&quot;&gt;            &lt;ul class=&quot;py-1&quot;&gt;
                                                        &lt;li&gt;
                        &lt;button
                            type=&quot;submit&quot;
                            name=&quot;locale&quot;
                            value=&quot;en&quot;
                            class=&quot;w-full text-left px-4 py-2 text-sm flex items-center gap-2
                                bg-gray-100 font-semibold text-gray-900
                                focus:outline-none&quot;
                            @click=&quot;open = false&quot;
                            disabled
                        &gt;
                            &lt;span&gt;🇬🇧&lt;/span&gt;
                            &lt;span&gt;English&lt;/span&gt;
                                                            &lt;svg class=&quot;ml-auto h-4 w-4 text-indigo-500&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; viewBox=&quot;0 0 24 24&quot;&gt;
                                    &lt;path stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; d=&quot;M5 13l4 4L19 7&quot;/&gt;
                                &lt;/svg&gt;
                                                    &lt;/button&gt;
                    &lt;/li&gt;
                                                        &lt;li&gt;
                        &lt;button
                            type=&quot;submit&quot;
                            name=&quot;locale&quot;
                            value=&quot;sk&quot;
                            class=&quot;w-full text-left px-4 py-2 text-sm flex items-center gap-2
                                text-gray-700 hover:bg-gray-50
                                focus:outline-none&quot;
                            @click=&quot;open = false&quot;

                        &gt;
                            &lt;span&gt;🇸🇰&lt;/span&gt;
                            &lt;span&gt;Slovak&lt;/span&gt;
                                                    &lt;/button&gt;
                    &lt;/li&gt;
                            &lt;/ul&gt;
        &lt;/form&gt;
    &lt;/div&gt;
&lt;/div&gt;
            &lt;div&gt;
                &lt;a href=&quot;/&quot;&gt;
                    &lt;svg viewBox=&quot;0 0 316 316&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; class=&quot;w-20 h-20 fill-current text-gray-500&quot;&gt;
    &lt;path d=&quot;M305.8 81.125C305.77 80.995 305.69 80.885 305.65 80.755C305.56 80.525 305.49 80.285 305.37 80.075C305.29 79.935 305.17 79.815 305.07 79.685C304.94 79.515 304.83 79.325 304.68 79.175C304.55 79.045 304.39 78.955 304.25 78.845C304.09 78.715 303.95 78.575 303.77 78.475L251.32 48.275C249.97 47.495 248.31 47.495 246.96 48.275L194.51 78.475C194.33 78.575 194.19 78.725 194.03 78.845C193.89 78.955 193.73 79.045 193.6 79.175C193.45 79.325 193.34 79.515 193.21 79.685C193.11 79.815 192.99 79.935 192.91 80.075C192.79 80.285 192.71 80.525 192.63 80.755C192.58 80.875 192.51 80.995 192.48 81.125C192.38 81.495 192.33 81.875 192.33 82.265V139.625L148.62 164.795V52.575C148.62 52.185 148.57 51.805 148.47 51.435C148.44 51.305 148.36 51.195 148.32 51.065C148.23 50.835 148.16 50.595 148.04 50.385C147.96 50.245 147.84 50.125 147.74 49.995C147.61 49.825 147.5 49.635 147.35 49.485C147.22 49.355 147.06 49.265 146.92 49.155C146.76 49.025 146.62 48.885 146.44 48.785L93.99 18.585C92.64 17.805 90.98 17.805 89.63 18.585L37.18 48.785C37 48.885 36.86 49.035 36.7 49.155C36.56 49.265 36.4 49.355 36.27 49.485C36.12 49.635 36.01 49.825 35.88 49.995C35.78 50.125 35.66 50.245 35.58 50.385C35.46 50.595 35.38 50.835 35.3 51.065C35.25 51.185 35.18 51.305 35.15 51.435C35.05 51.805 35 52.185 35 52.575V232.235C35 233.795 35.84 235.245 37.19 236.025L142.1 296.425C142.33 296.555 142.58 296.635 142.82 296.725C142.93 296.765 143.04 296.835 143.16 296.865C143.53 296.965 143.9 297.015 144.28 297.015C144.66 297.015 145.03 296.965 145.4 296.865C145.5 296.835 145.59 296.775 145.69 296.745C145.95 296.655 146.21 296.565 146.45 296.435L251.36 236.035C252.72 235.255 253.55 233.815 253.55 232.245V174.885L303.81 145.945C305.17 145.165 306 143.725 306 142.155V82.265C305.95 81.875 305.89 81.495 305.8 81.125ZM144.2 227.205L100.57 202.515L146.39 176.135L196.66 147.195L240.33 172.335L208.29 190.625L144.2 227.205ZM244.75 114.995V164.795L226.39 154.225L201.03 139.625V89.825L219.39 100.395L244.75 114.995ZM249.12 57.105L292.81 82.265L249.12 107.425L205.43 82.265L249.12 57.105ZM114.49 184.425L96.13 194.995V85.305L121.49 70.705L139.85 60.135V169.815L114.49 184.425ZM91.76 27.425L135.45 52.585L91.76 77.745L48.07 52.585L91.76 27.425ZM43.67 60.135L62.03 70.705L87.39 85.305V202.545V202.555V202.565C87.39 202.735 87.44 202.895 87.46 203.055C87.49 203.265 87.49 203.485 87.55 203.695V203.705C87.6 203.875 87.69 204.035 87.76 204.195C87.84 204.375 87.89 204.575 87.99 204.745C87.99 204.745 87.99 204.755 88 204.755C88.09 204.905 88.22 205.035 88.33 205.175C88.45 205.335 88.55 205.495 88.69 205.635L88.7 205.645C88.82 205.765 88.98 205.855 89.12 205.965C89.28 206.085 89.42 206.225 89.59 206.325C89.6 206.325 89.6 206.325 89.61 206.335C89.62 206.335 89.62 206.345 89.63 206.345L139.87 234.775V285.065L43.67 229.705V60.135ZM244.75 229.705L148.58 285.075V234.775L219.8 194.115L244.75 179.875V229.705ZM297.2 139.625L253.49 164.795V114.995L278.85 100.395L297.21 89.825V139.625H297.2Z&quot;/&gt;
&lt;/svg&gt;
                &lt;/a&gt;
            &lt;/div&gt;

            &lt;div class=&quot;w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg&quot;&gt;
                &lt;form method=&quot;POST&quot; action=&quot;http://localhost/register&quot;&gt;
        &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;SpT1KDDqw05ZSnNoF6uIAx4NIfeyxzDb4fPjk0Mg&quot; autocomplete=&quot;off&quot;&gt;
        &lt;!-- Name --&gt;
        &lt;div&gt;
            &lt;label class=&quot;block font-medium text-sm text-gray-700&quot; for=&quot;name&quot;&gt;
    Name
&lt;/label&gt;
            &lt;input  class=&quot;border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full&quot; id=&quot;name&quot; type=&quot;text&quot; name=&quot;name&quot; required=&quot;required&quot; autofocus=&quot;autofocus&quot; autocomplete=&quot;name&quot;&gt;
                    &lt;/div&gt;

        &lt;!-- Email Address --&gt;
        &lt;div class=&quot;mt-4&quot;&gt;
            &lt;label class=&quot;block font-medium text-sm text-gray-700&quot; for=&quot;email&quot;&gt;
    Email
&lt;/label&gt;
            &lt;input  class=&quot;border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full&quot; id=&quot;email&quot; type=&quot;email&quot; name=&quot;email&quot; required=&quot;required&quot; autocomplete=&quot;username&quot;&gt;
                    &lt;/div&gt;

        &lt;!-- Password --&gt;
        &lt;div class=&quot;mt-4&quot;&gt;
            &lt;label class=&quot;block font-medium text-sm text-gray-700&quot; for=&quot;password&quot;&gt;
    Password
&lt;/label&gt;

            &lt;input  class=&quot;border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full&quot; id=&quot;password&quot; type=&quot;password&quot; name=&quot;password&quot; required=&quot;required&quot; autocomplete=&quot;new-password&quot;&gt;

                    &lt;/div&gt;

        &lt;!-- Confirm Password --&gt;
        &lt;div class=&quot;mt-4&quot;&gt;
            &lt;label class=&quot;block font-medium text-sm text-gray-700&quot; for=&quot;password_confirmation&quot;&gt;
    Confirm Password
&lt;/label&gt;

            &lt;input  class=&quot;border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full&quot; id=&quot;password_confirmation&quot; type=&quot;password&quot; name=&quot;password_confirmation&quot; required=&quot;required&quot; autocomplete=&quot;new-password&quot;&gt;

                    &lt;/div&gt;

        &lt;div class=&quot;flex items-center justify-end mt-4&quot;&gt;
            &lt;a class=&quot;underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500&quot; href=&quot;http://localhost/login&quot;&gt;
                Already registered?
            &lt;/a&gt;

            &lt;button type=&quot;submit&quot; class=&quot;inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ms-4&quot;&gt;
    Register
&lt;/button&gt;
        &lt;/div&gt;
    &lt;/form&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETregister" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETregister"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETregister"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETregister" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETregister">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETregister" data-method="GET"
      data-path="register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETregister', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETregister"
                    onclick="tryItOut('GETregister');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETregister"
                    onclick="cancelTryOut('GETregister');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETregister"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETregister"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETregister"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTregister">Handle an incoming registration request.</h2>

<p>
</p>



<span id="example-requests-POSTregister">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"email\": \"zbailey@example.net\",
    \"password\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "email": "zbailey@example.net",
    "password": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTregister">
</span>
<span id="execution-results-POSTregister" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTregister"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTregister"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTregister" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTregister">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTregister" data-method="POST"
      data-path="register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTregister', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTregister"
                    onclick="tryItOut('POSTregister');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTregister"
                    onclick="cancelTryOut('POSTregister');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTregister"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTregister"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTregister"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTregister"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTregister"
               value="zbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Must not be greater than 255 characters. Example: <code>zbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTregister"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETlogin">Display the login view.</h2>

<p>
</p>



<span id="example-requests-GETlogin">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETlogin">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6ImpKaDBtZ0RiakpTSXNXdlc4YWgxOHc9PSIsInZhbHVlIjoiQnU1US9sTk5tdmZoRVBYZkM3VGNVemd3YVpoS1ZtMWs5MWlpbUtpL0ZURHIxZmFwcnJHbTdWa0ZXT1JiZm0zbHhITHFldTgyVFRKSk5xekhqTDd6S0lTSWtjNk1kNmVRMFhpVkcwc2crMm5zRkFKazNJRGdTdXdWc0ZMeXRTUloiLCJtYWMiOiIyMGEzMzQxYzdhODdkYWQ3ZGQ0MzVjNjE0OThlYTI3ZWRjMDNmNjgzMGQyNjkwYWE2ZjVmY2JiM2E1MTg2ZTQ2IiwidGFnIjoiIn0%3D; expires=Thu, 22 May 2025 14:53:48 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6ImoxWVBqWkZsZ21pdVZOM0tzYXdyQUE9PSIsInZhbHVlIjoianR2b0M0SzQrQmVlbEh3aER6UXRLRi9ZNHRieHZrdE9tOXJPeE56aWJaSEt2OGhUdCs0N3ZKMUtpUDFxK2pOcEpSa2s3UW9Sc3FWeHlpbW9tREl3cVRWYkhOUFRzeTFpbzZUNEwvKzAzVmhURUJJejFQbnVrNElYSFMxcWEwUWMiLCJtYWMiOiI4MjU3NWI5MDFmYTYxYjc3YTMxZjRkMzI4Y2ZiMjAyZTBhZDM1ZjEzNmJiZjU3MTIyMzczNDk0ZDU2MzA0NWIwIiwidGFnIjoiIn0%3D; expires=Thu, 22 May 2025 14:53:48 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;utf-8&quot;&gt;
        &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;
        &lt;meta name=&quot;csrf-token&quot; content=&quot;SpT1KDDqw05ZSnNoF6uIAx4NIfeyxzDb4fPjk0Mg&quot;&gt;

        &lt;title&gt;Laravel&lt;/title&gt;

        &lt;!-- Fonts --&gt;
        &lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.bunny.net&quot;&gt;
        &lt;link href=&quot;https://fonts.bunny.net/css?family=figtree:400,500,600&amp;display=swap&quot; rel=&quot;stylesheet&quot; /&gt;

        &lt;!-- Scripts --&gt;
        &lt;link rel=&quot;preload&quot; as=&quot;style&quot; href=&quot;http://localhost/build/assets/app-CVatbMnu.css&quot; /&gt;&lt;link rel=&quot;modulepreload&quot; href=&quot;http://localhost/build/assets/app-Bf4POITK.js&quot; /&gt;&lt;link rel=&quot;stylesheet&quot; href=&quot;http://localhost/build/assets/app-CVatbMnu.css&quot; /&gt;&lt;script type=&quot;module&quot; src=&quot;http://localhost/build/assets/app-Bf4POITK.js&quot;&gt;&lt;/script&gt;    &lt;/head&gt;
    &lt;body class=&quot;font-sans text-gray-900 antialiased&quot;&gt;
        &lt;div class=&quot;min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100&quot;&gt;
            &lt;div x-data=&quot;{ open: false }&quot; class=&quot;language-switcher relative inline-block text-left&quot;&gt;
    &lt;button
        @click=&quot;open = !open&quot;
        type=&quot;button&quot;
        class=&quot;inline-flex items-center px-3 py-2 border border-gray-300 bg-white text-sm font-medium rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500&quot;
        aria-haspopup=&quot;true&quot;
        :aria-expanded=&quot;open&quot;
    &gt;
        &lt;span class=&quot;mr-2&quot;&gt;🇬🇧&lt;/span&gt;

        &lt;svg class=&quot;ml-2 h-4 w-4 text-gray-500&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; fill=&quot;none&quot; viewBox=&quot;0 0 20 20&quot;&gt;
            &lt;path stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot;
                  d=&quot;M6 8l4 4 4-4&quot;/&gt;
        &lt;/svg&gt;
    &lt;/button&gt;
    &lt;div
        x-show=&quot;open&quot;
        @click.away=&quot;open = false&quot;
        x-transition:enter=&quot;transition ease-out duration-100&quot;
        x-transition:enter-start=&quot;transform opacity-0 scale-95&quot;
        x-transition:enter-end=&quot;transform opacity-100 scale-100&quot;
        x-transition:leave=&quot;transition ease-in duration-75&quot;
        x-transition:leave-start=&quot;transform opacity-100 scale-100&quot;
        x-transition:leave-end=&quot;transform opacity-0 scale-95&quot;
        class=&quot;origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50&quot;
        style=&quot;display: none;&quot;
    &gt;
        &lt;form action=&quot;http://localhost/language-switch&quot; method=&quot;POST&quot;&gt;
            &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;SpT1KDDqw05ZSnNoF6uIAx4NIfeyxzDb4fPjk0Mg&quot; autocomplete=&quot;off&quot;&gt;            &lt;ul class=&quot;py-1&quot;&gt;
                                                        &lt;li&gt;
                        &lt;button
                            type=&quot;submit&quot;
                            name=&quot;locale&quot;
                            value=&quot;en&quot;
                            class=&quot;w-full text-left px-4 py-2 text-sm flex items-center gap-2
                                bg-gray-100 font-semibold text-gray-900
                                focus:outline-none&quot;
                            @click=&quot;open = false&quot;
                            disabled
                        &gt;
                            &lt;span&gt;🇬🇧&lt;/span&gt;
                            &lt;span&gt;English&lt;/span&gt;
                                                            &lt;svg class=&quot;ml-auto h-4 w-4 text-indigo-500&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; viewBox=&quot;0 0 24 24&quot;&gt;
                                    &lt;path stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; d=&quot;M5 13l4 4L19 7&quot;/&gt;
                                &lt;/svg&gt;
                                                    &lt;/button&gt;
                    &lt;/li&gt;
                                                        &lt;li&gt;
                        &lt;button
                            type=&quot;submit&quot;
                            name=&quot;locale&quot;
                            value=&quot;sk&quot;
                            class=&quot;w-full text-left px-4 py-2 text-sm flex items-center gap-2
                                text-gray-700 hover:bg-gray-50
                                focus:outline-none&quot;
                            @click=&quot;open = false&quot;

                        &gt;
                            &lt;span&gt;🇸🇰&lt;/span&gt;
                            &lt;span&gt;Slovak&lt;/span&gt;
                                                    &lt;/button&gt;
                    &lt;/li&gt;
                            &lt;/ul&gt;
        &lt;/form&gt;
    &lt;/div&gt;
&lt;/div&gt;
            &lt;div&gt;
                &lt;a href=&quot;/&quot;&gt;
                    &lt;svg viewBox=&quot;0 0 316 316&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; class=&quot;w-20 h-20 fill-current text-gray-500&quot;&gt;
    &lt;path d=&quot;M305.8 81.125C305.77 80.995 305.69 80.885 305.65 80.755C305.56 80.525 305.49 80.285 305.37 80.075C305.29 79.935 305.17 79.815 305.07 79.685C304.94 79.515 304.83 79.325 304.68 79.175C304.55 79.045 304.39 78.955 304.25 78.845C304.09 78.715 303.95 78.575 303.77 78.475L251.32 48.275C249.97 47.495 248.31 47.495 246.96 48.275L194.51 78.475C194.33 78.575 194.19 78.725 194.03 78.845C193.89 78.955 193.73 79.045 193.6 79.175C193.45 79.325 193.34 79.515 193.21 79.685C193.11 79.815 192.99 79.935 192.91 80.075C192.79 80.285 192.71 80.525 192.63 80.755C192.58 80.875 192.51 80.995 192.48 81.125C192.38 81.495 192.33 81.875 192.33 82.265V139.625L148.62 164.795V52.575C148.62 52.185 148.57 51.805 148.47 51.435C148.44 51.305 148.36 51.195 148.32 51.065C148.23 50.835 148.16 50.595 148.04 50.385C147.96 50.245 147.84 50.125 147.74 49.995C147.61 49.825 147.5 49.635 147.35 49.485C147.22 49.355 147.06 49.265 146.92 49.155C146.76 49.025 146.62 48.885 146.44 48.785L93.99 18.585C92.64 17.805 90.98 17.805 89.63 18.585L37.18 48.785C37 48.885 36.86 49.035 36.7 49.155C36.56 49.265 36.4 49.355 36.27 49.485C36.12 49.635 36.01 49.825 35.88 49.995C35.78 50.125 35.66 50.245 35.58 50.385C35.46 50.595 35.38 50.835 35.3 51.065C35.25 51.185 35.18 51.305 35.15 51.435C35.05 51.805 35 52.185 35 52.575V232.235C35 233.795 35.84 235.245 37.19 236.025L142.1 296.425C142.33 296.555 142.58 296.635 142.82 296.725C142.93 296.765 143.04 296.835 143.16 296.865C143.53 296.965 143.9 297.015 144.28 297.015C144.66 297.015 145.03 296.965 145.4 296.865C145.5 296.835 145.59 296.775 145.69 296.745C145.95 296.655 146.21 296.565 146.45 296.435L251.36 236.035C252.72 235.255 253.55 233.815 253.55 232.245V174.885L303.81 145.945C305.17 145.165 306 143.725 306 142.155V82.265C305.95 81.875 305.89 81.495 305.8 81.125ZM144.2 227.205L100.57 202.515L146.39 176.135L196.66 147.195L240.33 172.335L208.29 190.625L144.2 227.205ZM244.75 114.995V164.795L226.39 154.225L201.03 139.625V89.825L219.39 100.395L244.75 114.995ZM249.12 57.105L292.81 82.265L249.12 107.425L205.43 82.265L249.12 57.105ZM114.49 184.425L96.13 194.995V85.305L121.49 70.705L139.85 60.135V169.815L114.49 184.425ZM91.76 27.425L135.45 52.585L91.76 77.745L48.07 52.585L91.76 27.425ZM43.67 60.135L62.03 70.705L87.39 85.305V202.545V202.555V202.565C87.39 202.735 87.44 202.895 87.46 203.055C87.49 203.265 87.49 203.485 87.55 203.695V203.705C87.6 203.875 87.69 204.035 87.76 204.195C87.84 204.375 87.89 204.575 87.99 204.745C87.99 204.745 87.99 204.755 88 204.755C88.09 204.905 88.22 205.035 88.33 205.175C88.45 205.335 88.55 205.495 88.69 205.635L88.7 205.645C88.82 205.765 88.98 205.855 89.12 205.965C89.28 206.085 89.42 206.225 89.59 206.325C89.6 206.325 89.6 206.325 89.61 206.335C89.62 206.335 89.62 206.345 89.63 206.345L139.87 234.775V285.065L43.67 229.705V60.135ZM244.75 229.705L148.58 285.075V234.775L219.8 194.115L244.75 179.875V229.705ZM297.2 139.625L253.49 164.795V114.995L278.85 100.395L297.21 89.825V139.625H297.2Z&quot;/&gt;
&lt;/svg&gt;
                &lt;/a&gt;
            &lt;/div&gt;

            &lt;div class=&quot;w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg&quot;&gt;
                &lt;!-- Session Status --&gt;

    &lt;form method=&quot;POST&quot; action=&quot;http://localhost/login&quot;&gt;
        &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;SpT1KDDqw05ZSnNoF6uIAx4NIfeyxzDb4fPjk0Mg&quot; autocomplete=&quot;off&quot;&gt;
        &lt;!-- Email Address --&gt;
        &lt;div&gt;
            &lt;label class=&quot;block font-medium text-sm text-gray-700&quot; for=&quot;email&quot;&gt;
    Email
&lt;/label&gt;
            &lt;input  class=&quot;border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full&quot; id=&quot;email&quot; type=&quot;email&quot; name=&quot;email&quot; required=&quot;required&quot; autofocus=&quot;autofocus&quot; autocomplete=&quot;username&quot;&gt;
                    &lt;/div&gt;

        &lt;!-- Password --&gt;
        &lt;div class=&quot;mt-4&quot;&gt;
            &lt;label class=&quot;block font-medium text-sm text-gray-700&quot; for=&quot;password&quot;&gt;
    Password
&lt;/label&gt;

            &lt;input  class=&quot;border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full&quot; id=&quot;password&quot; type=&quot;password&quot; name=&quot;password&quot; required=&quot;required&quot; autocomplete=&quot;current-password&quot;&gt;

                    &lt;/div&gt;

        &lt;!-- Remember Me --&gt;
        &lt;div class=&quot;block mt-4&quot;&gt;
            &lt;label for=&quot;remember_me&quot; class=&quot;inline-flex items-center&quot;&gt;
                &lt;input id=&quot;remember_me&quot; type=&quot;checkbox&quot; class=&quot;rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500&quot; name=&quot;remember&quot;&gt;
                &lt;span class=&quot;ms-2 text-sm text-gray-600&quot;&gt;Remember me&lt;/span&gt;
            &lt;/label&gt;
        &lt;/div&gt;

        &lt;div class=&quot;flex items-center justify-between mt-4&quot;&gt;
            &lt;a class=&quot;underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500&quot; href=&quot;http://localhost/register&quot;&gt;
                New user?
            &lt;/a&gt;

            &lt;div class=&quot;flex items-center space-x-2&quot;&gt;
                                    &lt;a class=&quot;underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500&quot; href=&quot;http://localhost/forgot-password&quot;&gt;
                        Forgot your password?
                    &lt;/a&gt;

                &lt;button type=&quot;submit&quot; class=&quot;inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ms-3&quot;&gt;
    Log in
&lt;/button&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/form&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETlogin" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETlogin"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETlogin"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETlogin">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETlogin" data-method="GET"
      data-path="login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETlogin', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETlogin"
                    onclick="tryItOut('GETlogin');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETlogin"
                    onclick="cancelTryOut('GETlogin');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETlogin"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETlogin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETlogin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTlogin">Handle an incoming authentication request.</h2>

<p>
</p>



<span id="example-requests-POSTlogin">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\",
    \"password\": \"|]|{+-\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net",
    "password": "|]|{+-"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTlogin">
</span>
<span id="execution-results-POSTlogin" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTlogin"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTlogin"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlogin">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTlogin" data-method="POST"
      data-path="login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTlogin', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTlogin"
                    onclick="tryItOut('POSTlogin');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTlogin"
                    onclick="cancelTryOut('POSTlogin');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTlogin"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTlogin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTlogin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTlogin"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTlogin"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Example: <code>|]|{+-</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETforgot-password">Display the password reset link request view.</h2>

<p>
</p>



<span id="example-requests-GETforgot-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/forgot-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/forgot-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETforgot-password">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6InJmNnNyWE9WVllndk1UL2Z3TXBOWFE9PSIsInZhbHVlIjoiR3RMeUdqTERaa0hOSUx1cXpkVmJSVXQwdlpVN05OUWFJOURrMlo1Qk41ZnZYblVwVU5pQVBTVWo1WGY1M3VIYjE4SlR6Qnc4dW8vdG8vajRyN1lhU3l5NjAweHJUbHdCNFpZNXIrR1FnZ2kvbG9wWkp1QmM4TUtzYlkwM3htT1giLCJtYWMiOiIxOGNhNTQwZjJiMWRiZDY0OTU0MDVjMDY4YThmZmNmN2M1NzE5NDlmMTZkM2FhOTcxOTg3NmMyODlhMTdiMzBiIiwidGFnIjoiIn0%3D; expires=Thu, 22 May 2025 14:53:48 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IkpEdThCV0pBSGUxMDhUU3NzaFRPaWc9PSIsInZhbHVlIjoiWU1XRHhwOXZIa2RjOU52aXhsTEF0L0twdWR4ekVBTG9MNmp2SmExanBXUklGQU8rY0VKb3RvNk8rNXhPZnlGanlWVDhRbzY2YmpLQU9IaXBPbzM2U3BLVCs3blRjNlNQbzQwNkp0U0dvWGVNQkRFdHJ1YXNuWDJacW9OZ2diMWkiLCJtYWMiOiIyNTVjZGQ3NDk5NGMzZGQzNDU4NDI1ZjFhMzU2Mjk5ZTQyYWZjNjQzNDQ0YTlhZGM2MjgzYTcxMWY4MDk2OTA5IiwidGFnIjoiIn0%3D; expires=Thu, 22 May 2025 14:53:48 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;utf-8&quot;&gt;
        &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;
        &lt;meta name=&quot;csrf-token&quot; content=&quot;SpT1KDDqw05ZSnNoF6uIAx4NIfeyxzDb4fPjk0Mg&quot;&gt;

        &lt;title&gt;Laravel&lt;/title&gt;

        &lt;!-- Fonts --&gt;
        &lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.bunny.net&quot;&gt;
        &lt;link href=&quot;https://fonts.bunny.net/css?family=figtree:400,500,600&amp;display=swap&quot; rel=&quot;stylesheet&quot; /&gt;

        &lt;!-- Scripts --&gt;
        &lt;link rel=&quot;preload&quot; as=&quot;style&quot; href=&quot;http://localhost/build/assets/app-CVatbMnu.css&quot; /&gt;&lt;link rel=&quot;modulepreload&quot; href=&quot;http://localhost/build/assets/app-Bf4POITK.js&quot; /&gt;&lt;link rel=&quot;stylesheet&quot; href=&quot;http://localhost/build/assets/app-CVatbMnu.css&quot; /&gt;&lt;script type=&quot;module&quot; src=&quot;http://localhost/build/assets/app-Bf4POITK.js&quot;&gt;&lt;/script&gt;    &lt;/head&gt;
    &lt;body class=&quot;font-sans text-gray-900 antialiased&quot;&gt;
        &lt;div class=&quot;min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100&quot;&gt;
            &lt;div x-data=&quot;{ open: false }&quot; class=&quot;language-switcher relative inline-block text-left&quot;&gt;
    &lt;button
        @click=&quot;open = !open&quot;
        type=&quot;button&quot;
        class=&quot;inline-flex items-center px-3 py-2 border border-gray-300 bg-white text-sm font-medium rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500&quot;
        aria-haspopup=&quot;true&quot;
        :aria-expanded=&quot;open&quot;
    &gt;
        &lt;span class=&quot;mr-2&quot;&gt;🇬🇧&lt;/span&gt;

        &lt;svg class=&quot;ml-2 h-4 w-4 text-gray-500&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; fill=&quot;none&quot; viewBox=&quot;0 0 20 20&quot;&gt;
            &lt;path stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot;
                  d=&quot;M6 8l4 4 4-4&quot;/&gt;
        &lt;/svg&gt;
    &lt;/button&gt;
    &lt;div
        x-show=&quot;open&quot;
        @click.away=&quot;open = false&quot;
        x-transition:enter=&quot;transition ease-out duration-100&quot;
        x-transition:enter-start=&quot;transform opacity-0 scale-95&quot;
        x-transition:enter-end=&quot;transform opacity-100 scale-100&quot;
        x-transition:leave=&quot;transition ease-in duration-75&quot;
        x-transition:leave-start=&quot;transform opacity-100 scale-100&quot;
        x-transition:leave-end=&quot;transform opacity-0 scale-95&quot;
        class=&quot;origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50&quot;
        style=&quot;display: none;&quot;
    &gt;
        &lt;form action=&quot;http://localhost/language-switch&quot; method=&quot;POST&quot;&gt;
            &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;SpT1KDDqw05ZSnNoF6uIAx4NIfeyxzDb4fPjk0Mg&quot; autocomplete=&quot;off&quot;&gt;            &lt;ul class=&quot;py-1&quot;&gt;
                                                        &lt;li&gt;
                        &lt;button
                            type=&quot;submit&quot;
                            name=&quot;locale&quot;
                            value=&quot;en&quot;
                            class=&quot;w-full text-left px-4 py-2 text-sm flex items-center gap-2
                                bg-gray-100 font-semibold text-gray-900
                                focus:outline-none&quot;
                            @click=&quot;open = false&quot;
                            disabled
                        &gt;
                            &lt;span&gt;🇬🇧&lt;/span&gt;
                            &lt;span&gt;English&lt;/span&gt;
                                                            &lt;svg class=&quot;ml-auto h-4 w-4 text-indigo-500&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; viewBox=&quot;0 0 24 24&quot;&gt;
                                    &lt;path stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; d=&quot;M5 13l4 4L19 7&quot;/&gt;
                                &lt;/svg&gt;
                                                    &lt;/button&gt;
                    &lt;/li&gt;
                                                        &lt;li&gt;
                        &lt;button
                            type=&quot;submit&quot;
                            name=&quot;locale&quot;
                            value=&quot;sk&quot;
                            class=&quot;w-full text-left px-4 py-2 text-sm flex items-center gap-2
                                text-gray-700 hover:bg-gray-50
                                focus:outline-none&quot;
                            @click=&quot;open = false&quot;

                        &gt;
                            &lt;span&gt;🇸🇰&lt;/span&gt;
                            &lt;span&gt;Slovak&lt;/span&gt;
                                                    &lt;/button&gt;
                    &lt;/li&gt;
                            &lt;/ul&gt;
        &lt;/form&gt;
    &lt;/div&gt;
&lt;/div&gt;
            &lt;div&gt;
                &lt;a href=&quot;/&quot;&gt;
                    &lt;svg viewBox=&quot;0 0 316 316&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; class=&quot;w-20 h-20 fill-current text-gray-500&quot;&gt;
    &lt;path d=&quot;M305.8 81.125C305.77 80.995 305.69 80.885 305.65 80.755C305.56 80.525 305.49 80.285 305.37 80.075C305.29 79.935 305.17 79.815 305.07 79.685C304.94 79.515 304.83 79.325 304.68 79.175C304.55 79.045 304.39 78.955 304.25 78.845C304.09 78.715 303.95 78.575 303.77 78.475L251.32 48.275C249.97 47.495 248.31 47.495 246.96 48.275L194.51 78.475C194.33 78.575 194.19 78.725 194.03 78.845C193.89 78.955 193.73 79.045 193.6 79.175C193.45 79.325 193.34 79.515 193.21 79.685C193.11 79.815 192.99 79.935 192.91 80.075C192.79 80.285 192.71 80.525 192.63 80.755C192.58 80.875 192.51 80.995 192.48 81.125C192.38 81.495 192.33 81.875 192.33 82.265V139.625L148.62 164.795V52.575C148.62 52.185 148.57 51.805 148.47 51.435C148.44 51.305 148.36 51.195 148.32 51.065C148.23 50.835 148.16 50.595 148.04 50.385C147.96 50.245 147.84 50.125 147.74 49.995C147.61 49.825 147.5 49.635 147.35 49.485C147.22 49.355 147.06 49.265 146.92 49.155C146.76 49.025 146.62 48.885 146.44 48.785L93.99 18.585C92.64 17.805 90.98 17.805 89.63 18.585L37.18 48.785C37 48.885 36.86 49.035 36.7 49.155C36.56 49.265 36.4 49.355 36.27 49.485C36.12 49.635 36.01 49.825 35.88 49.995C35.78 50.125 35.66 50.245 35.58 50.385C35.46 50.595 35.38 50.835 35.3 51.065C35.25 51.185 35.18 51.305 35.15 51.435C35.05 51.805 35 52.185 35 52.575V232.235C35 233.795 35.84 235.245 37.19 236.025L142.1 296.425C142.33 296.555 142.58 296.635 142.82 296.725C142.93 296.765 143.04 296.835 143.16 296.865C143.53 296.965 143.9 297.015 144.28 297.015C144.66 297.015 145.03 296.965 145.4 296.865C145.5 296.835 145.59 296.775 145.69 296.745C145.95 296.655 146.21 296.565 146.45 296.435L251.36 236.035C252.72 235.255 253.55 233.815 253.55 232.245V174.885L303.81 145.945C305.17 145.165 306 143.725 306 142.155V82.265C305.95 81.875 305.89 81.495 305.8 81.125ZM144.2 227.205L100.57 202.515L146.39 176.135L196.66 147.195L240.33 172.335L208.29 190.625L144.2 227.205ZM244.75 114.995V164.795L226.39 154.225L201.03 139.625V89.825L219.39 100.395L244.75 114.995ZM249.12 57.105L292.81 82.265L249.12 107.425L205.43 82.265L249.12 57.105ZM114.49 184.425L96.13 194.995V85.305L121.49 70.705L139.85 60.135V169.815L114.49 184.425ZM91.76 27.425L135.45 52.585L91.76 77.745L48.07 52.585L91.76 27.425ZM43.67 60.135L62.03 70.705L87.39 85.305V202.545V202.555V202.565C87.39 202.735 87.44 202.895 87.46 203.055C87.49 203.265 87.49 203.485 87.55 203.695V203.705C87.6 203.875 87.69 204.035 87.76 204.195C87.84 204.375 87.89 204.575 87.99 204.745C87.99 204.745 87.99 204.755 88 204.755C88.09 204.905 88.22 205.035 88.33 205.175C88.45 205.335 88.55 205.495 88.69 205.635L88.7 205.645C88.82 205.765 88.98 205.855 89.12 205.965C89.28 206.085 89.42 206.225 89.59 206.325C89.6 206.325 89.6 206.325 89.61 206.335C89.62 206.335 89.62 206.345 89.63 206.345L139.87 234.775V285.065L43.67 229.705V60.135ZM244.75 229.705L148.58 285.075V234.775L219.8 194.115L244.75 179.875V229.705ZM297.2 139.625L253.49 164.795V114.995L278.85 100.395L297.21 89.825V139.625H297.2Z&quot;/&gt;
&lt;/svg&gt;
                &lt;/a&gt;
            &lt;/div&gt;

            &lt;div class=&quot;w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg&quot;&gt;
                &lt;div class=&quot;mb-4 text-sm text-gray-600&quot;&gt;
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
    &lt;/div&gt;

    &lt;!-- Session Status --&gt;

    &lt;form method=&quot;POST&quot; action=&quot;http://localhost/forgot-password&quot;&gt;
        &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;SpT1KDDqw05ZSnNoF6uIAx4NIfeyxzDb4fPjk0Mg&quot; autocomplete=&quot;off&quot;&gt;
        &lt;!-- Email Address --&gt;
        &lt;div&gt;
            &lt;label class=&quot;block font-medium text-sm text-gray-700&quot; for=&quot;email&quot;&gt;
    Email
&lt;/label&gt;
            &lt;input  class=&quot;border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full&quot; id=&quot;email&quot; type=&quot;email&quot; name=&quot;email&quot; required=&quot;required&quot; autofocus=&quot;autofocus&quot;&gt;
                    &lt;/div&gt;

        &lt;div class=&quot;flex items-center justify-end mt-4&quot;&gt;
            &lt;button type=&quot;submit&quot; class=&quot;inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150&quot;&gt;
    Email Password Reset Link
&lt;/button&gt;
        &lt;/div&gt;
    &lt;/form&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETforgot-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETforgot-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETforgot-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETforgot-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETforgot-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETforgot-password" data-method="GET"
      data-path="forgot-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETforgot-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETforgot-password"
                    onclick="tryItOut('GETforgot-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETforgot-password"
                    onclick="cancelTryOut('GETforgot-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETforgot-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>forgot-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETforgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETforgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTforgot-password">Handle an incoming password reset link request.</h2>

<p>
</p>



<span id="example-requests-POSTforgot-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/forgot-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/forgot-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTforgot-password">
</span>
<span id="execution-results-POSTforgot-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTforgot-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTforgot-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTforgot-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTforgot-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTforgot-password" data-method="POST"
      data-path="forgot-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTforgot-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTforgot-password"
                    onclick="tryItOut('POSTforgot-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTforgot-password"
                    onclick="cancelTryOut('POSTforgot-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTforgot-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>forgot-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTforgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTforgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTforgot-password"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>gbailey@example.net</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETreset-password--token-">Display the password reset view.</h2>

<p>
</p>



<span id="example-requests-GETreset-password--token-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/reset-password/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/reset-password/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETreset-password--token-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
set-cookie: XSRF-TOKEN=eyJpdiI6IlF5NHhqNXlWNzJHNGhFRFkwZlVVRkE9PSIsInZhbHVlIjoiZDZzQTlsd1A5d2tRSzdpQTFzSjNlbDI0c3JCZStiYjFFZFRrc3hBTEUwNkNYd3BtVUpoOEF5eW9mMVVGL1BYNnBHL1RDb1N0dVlabnBrOTQzSExYRlltOC8rcHVRMm1iNzQ2T1EweGsybGlWdW1lNEdGajdNTmp0NU80aWdtMU4iLCJtYWMiOiI2Mjc4ZmE5NmU3OGQzODllMzlkZTk0YzgxMjdmOGI5NGU2NzBlNDc0MTdlNThlYjk4ZTc3ZjZhNTkxMDY5YjI0IiwidGFnIjoiIn0%3D; expires=Thu, 22 May 2025 14:53:48 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6Ik00WFhqRXJSS3pTbEVzcTM2Z0dvUXc9PSIsInZhbHVlIjoiWDE0My9lcmVjRmpmalJNVGdMUkJwVGZKbW5Dc2RWZzFzRlIrcWd1ZkV0WDVDZFJyZFBZeXRjM1Q5dmI4VTFvM2VVVm44Q0txVkdCVmRRbDZVVTNwVytGd1l4MDljWUMwTzg1aklkMWVhdTFOdVFJOEJLSjJ3bEw4UnJXTlZ5SisiLCJtYWMiOiI4MTA2ZDY5YWJmMzJjMzFiNmI4NzFhNDUyZjEyOGQwNjI3MDZiYWFhZDIyZjVjN2U4NDY0ZWRlZGVlZjEyNDBhIiwidGFnIjoiIn0%3D; expires=Thu, 22 May 2025 14:53:48 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
    &lt;head&gt;
        &lt;meta charset=&quot;utf-8&quot;&gt;
        &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;
        &lt;meta name=&quot;csrf-token&quot; content=&quot;SpT1KDDqw05ZSnNoF6uIAx4NIfeyxzDb4fPjk0Mg&quot;&gt;

        &lt;title&gt;Laravel&lt;/title&gt;

        &lt;!-- Fonts --&gt;
        &lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.bunny.net&quot;&gt;
        &lt;link href=&quot;https://fonts.bunny.net/css?family=figtree:400,500,600&amp;display=swap&quot; rel=&quot;stylesheet&quot; /&gt;

        &lt;!-- Scripts --&gt;
        &lt;link rel=&quot;preload&quot; as=&quot;style&quot; href=&quot;http://localhost/build/assets/app-CVatbMnu.css&quot; /&gt;&lt;link rel=&quot;modulepreload&quot; href=&quot;http://localhost/build/assets/app-Bf4POITK.js&quot; /&gt;&lt;link rel=&quot;stylesheet&quot; href=&quot;http://localhost/build/assets/app-CVatbMnu.css&quot; /&gt;&lt;script type=&quot;module&quot; src=&quot;http://localhost/build/assets/app-Bf4POITK.js&quot;&gt;&lt;/script&gt;    &lt;/head&gt;
    &lt;body class=&quot;font-sans text-gray-900 antialiased&quot;&gt;
        &lt;div class=&quot;min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100&quot;&gt;
            &lt;div x-data=&quot;{ open: false }&quot; class=&quot;language-switcher relative inline-block text-left&quot;&gt;
    &lt;button
        @click=&quot;open = !open&quot;
        type=&quot;button&quot;
        class=&quot;inline-flex items-center px-3 py-2 border border-gray-300 bg-white text-sm font-medium rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500&quot;
        aria-haspopup=&quot;true&quot;
        :aria-expanded=&quot;open&quot;
    &gt;
        &lt;span class=&quot;mr-2&quot;&gt;🇬🇧&lt;/span&gt;

        &lt;svg class=&quot;ml-2 h-4 w-4 text-gray-500&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; fill=&quot;none&quot; viewBox=&quot;0 0 20 20&quot;&gt;
            &lt;path stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot;
                  d=&quot;M6 8l4 4 4-4&quot;/&gt;
        &lt;/svg&gt;
    &lt;/button&gt;
    &lt;div
        x-show=&quot;open&quot;
        @click.away=&quot;open = false&quot;
        x-transition:enter=&quot;transition ease-out duration-100&quot;
        x-transition:enter-start=&quot;transform opacity-0 scale-95&quot;
        x-transition:enter-end=&quot;transform opacity-100 scale-100&quot;
        x-transition:leave=&quot;transition ease-in duration-75&quot;
        x-transition:leave-start=&quot;transform opacity-100 scale-100&quot;
        x-transition:leave-end=&quot;transform opacity-0 scale-95&quot;
        class=&quot;origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50&quot;
        style=&quot;display: none;&quot;
    &gt;
        &lt;form action=&quot;http://localhost/language-switch&quot; method=&quot;POST&quot;&gt;
            &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;SpT1KDDqw05ZSnNoF6uIAx4NIfeyxzDb4fPjk0Mg&quot; autocomplete=&quot;off&quot;&gt;            &lt;ul class=&quot;py-1&quot;&gt;
                                                        &lt;li&gt;
                        &lt;button
                            type=&quot;submit&quot;
                            name=&quot;locale&quot;
                            value=&quot;en&quot;
                            class=&quot;w-full text-left px-4 py-2 text-sm flex items-center gap-2
                                bg-gray-100 font-semibold text-gray-900
                                focus:outline-none&quot;
                            @click=&quot;open = false&quot;
                            disabled
                        &gt;
                            &lt;span&gt;🇬🇧&lt;/span&gt;
                            &lt;span&gt;English&lt;/span&gt;
                                                            &lt;svg class=&quot;ml-auto h-4 w-4 text-indigo-500&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; viewBox=&quot;0 0 24 24&quot;&gt;
                                    &lt;path stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; d=&quot;M5 13l4 4L19 7&quot;/&gt;
                                &lt;/svg&gt;
                                                    &lt;/button&gt;
                    &lt;/li&gt;
                                                        &lt;li&gt;
                        &lt;button
                            type=&quot;submit&quot;
                            name=&quot;locale&quot;
                            value=&quot;sk&quot;
                            class=&quot;w-full text-left px-4 py-2 text-sm flex items-center gap-2
                                text-gray-700 hover:bg-gray-50
                                focus:outline-none&quot;
                            @click=&quot;open = false&quot;

                        &gt;
                            &lt;span&gt;🇸🇰&lt;/span&gt;
                            &lt;span&gt;Slovak&lt;/span&gt;
                                                    &lt;/button&gt;
                    &lt;/li&gt;
                            &lt;/ul&gt;
        &lt;/form&gt;
    &lt;/div&gt;
&lt;/div&gt;
            &lt;div&gt;
                &lt;a href=&quot;/&quot;&gt;
                    &lt;svg viewBox=&quot;0 0 316 316&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; class=&quot;w-20 h-20 fill-current text-gray-500&quot;&gt;
    &lt;path d=&quot;M305.8 81.125C305.77 80.995 305.69 80.885 305.65 80.755C305.56 80.525 305.49 80.285 305.37 80.075C305.29 79.935 305.17 79.815 305.07 79.685C304.94 79.515 304.83 79.325 304.68 79.175C304.55 79.045 304.39 78.955 304.25 78.845C304.09 78.715 303.95 78.575 303.77 78.475L251.32 48.275C249.97 47.495 248.31 47.495 246.96 48.275L194.51 78.475C194.33 78.575 194.19 78.725 194.03 78.845C193.89 78.955 193.73 79.045 193.6 79.175C193.45 79.325 193.34 79.515 193.21 79.685C193.11 79.815 192.99 79.935 192.91 80.075C192.79 80.285 192.71 80.525 192.63 80.755C192.58 80.875 192.51 80.995 192.48 81.125C192.38 81.495 192.33 81.875 192.33 82.265V139.625L148.62 164.795V52.575C148.62 52.185 148.57 51.805 148.47 51.435C148.44 51.305 148.36 51.195 148.32 51.065C148.23 50.835 148.16 50.595 148.04 50.385C147.96 50.245 147.84 50.125 147.74 49.995C147.61 49.825 147.5 49.635 147.35 49.485C147.22 49.355 147.06 49.265 146.92 49.155C146.76 49.025 146.62 48.885 146.44 48.785L93.99 18.585C92.64 17.805 90.98 17.805 89.63 18.585L37.18 48.785C37 48.885 36.86 49.035 36.7 49.155C36.56 49.265 36.4 49.355 36.27 49.485C36.12 49.635 36.01 49.825 35.88 49.995C35.78 50.125 35.66 50.245 35.58 50.385C35.46 50.595 35.38 50.835 35.3 51.065C35.25 51.185 35.18 51.305 35.15 51.435C35.05 51.805 35 52.185 35 52.575V232.235C35 233.795 35.84 235.245 37.19 236.025L142.1 296.425C142.33 296.555 142.58 296.635 142.82 296.725C142.93 296.765 143.04 296.835 143.16 296.865C143.53 296.965 143.9 297.015 144.28 297.015C144.66 297.015 145.03 296.965 145.4 296.865C145.5 296.835 145.59 296.775 145.69 296.745C145.95 296.655 146.21 296.565 146.45 296.435L251.36 236.035C252.72 235.255 253.55 233.815 253.55 232.245V174.885L303.81 145.945C305.17 145.165 306 143.725 306 142.155V82.265C305.95 81.875 305.89 81.495 305.8 81.125ZM144.2 227.205L100.57 202.515L146.39 176.135L196.66 147.195L240.33 172.335L208.29 190.625L144.2 227.205ZM244.75 114.995V164.795L226.39 154.225L201.03 139.625V89.825L219.39 100.395L244.75 114.995ZM249.12 57.105L292.81 82.265L249.12 107.425L205.43 82.265L249.12 57.105ZM114.49 184.425L96.13 194.995V85.305L121.49 70.705L139.85 60.135V169.815L114.49 184.425ZM91.76 27.425L135.45 52.585L91.76 77.745L48.07 52.585L91.76 27.425ZM43.67 60.135L62.03 70.705L87.39 85.305V202.545V202.555V202.565C87.39 202.735 87.44 202.895 87.46 203.055C87.49 203.265 87.49 203.485 87.55 203.695V203.705C87.6 203.875 87.69 204.035 87.76 204.195C87.84 204.375 87.89 204.575 87.99 204.745C87.99 204.745 87.99 204.755 88 204.755C88.09 204.905 88.22 205.035 88.33 205.175C88.45 205.335 88.55 205.495 88.69 205.635L88.7 205.645C88.82 205.765 88.98 205.855 89.12 205.965C89.28 206.085 89.42 206.225 89.59 206.325C89.6 206.325 89.6 206.325 89.61 206.335C89.62 206.335 89.62 206.345 89.63 206.345L139.87 234.775V285.065L43.67 229.705V60.135ZM244.75 229.705L148.58 285.075V234.775L219.8 194.115L244.75 179.875V229.705ZM297.2 139.625L253.49 164.795V114.995L278.85 100.395L297.21 89.825V139.625H297.2Z&quot;/&gt;
&lt;/svg&gt;
                &lt;/a&gt;
            &lt;/div&gt;

            &lt;div class=&quot;w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg&quot;&gt;
                &lt;form method=&quot;POST&quot; action=&quot;http://localhost/reset-password&quot;&gt;
        &lt;input type=&quot;hidden&quot; name=&quot;_token&quot; value=&quot;SpT1KDDqw05ZSnNoF6uIAx4NIfeyxzDb4fPjk0Mg&quot; autocomplete=&quot;off&quot;&gt;
        &lt;!-- Password Reset Token --&gt;
        &lt;input type=&quot;hidden&quot; name=&quot;token&quot; value=&quot;architecto&quot;&gt;

        &lt;!-- Email Address --&gt;
        &lt;div&gt;
            &lt;label class=&quot;block font-medium text-sm text-gray-700&quot; for=&quot;email&quot;&gt;
    Email
&lt;/label&gt;
            &lt;input  class=&quot;border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full&quot; id=&quot;email&quot; type=&quot;email&quot; name=&quot;email&quot; required=&quot;required&quot; autofocus=&quot;autofocus&quot; autocomplete=&quot;username&quot;&gt;
                    &lt;/div&gt;

        &lt;!-- Password --&gt;
        &lt;div class=&quot;mt-4&quot;&gt;
            &lt;label class=&quot;block font-medium text-sm text-gray-700&quot; for=&quot;password&quot;&gt;
    Password
&lt;/label&gt;
            &lt;input  class=&quot;border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full&quot; id=&quot;password&quot; type=&quot;password&quot; name=&quot;password&quot; required=&quot;required&quot; autocomplete=&quot;new-password&quot;&gt;
                    &lt;/div&gt;

        &lt;!-- Confirm Password --&gt;
        &lt;div class=&quot;mt-4&quot;&gt;
            &lt;label class=&quot;block font-medium text-sm text-gray-700&quot; for=&quot;password_confirmation&quot;&gt;
    Confirm Password
&lt;/label&gt;

            &lt;input  class=&quot;border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full&quot; id=&quot;password_confirmation&quot; type=&quot;password&quot; name=&quot;password_confirmation&quot; required=&quot;required&quot; autocomplete=&quot;new-password&quot;&gt;

                    &lt;/div&gt;

        &lt;div class=&quot;flex items-center justify-end mt-4&quot;&gt;
            &lt;button type=&quot;submit&quot; class=&quot;inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150&quot;&gt;
    Reset Password
&lt;/button&gt;
        &lt;/div&gt;
    &lt;/form&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETreset-password--token-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETreset-password--token-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETreset-password--token-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETreset-password--token-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETreset-password--token-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETreset-password--token-" data-method="GET"
      data-path="reset-password/{token}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETreset-password--token-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETreset-password--token-"
                    onclick="tryItOut('GETreset-password--token-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETreset-password--token-"
                    onclick="cancelTryOut('GETreset-password--token-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETreset-password--token-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>reset-password/{token}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETreset-password--token-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETreset-password--token-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="token"                data-endpoint="GETreset-password--token-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTreset-password">Handle an incoming new password request.</h2>

<p>
</p>



<span id="example-requests-POSTreset-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/reset-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"token\": \"architecto\",
    \"email\": \"zbailey@example.net\",
    \"password\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/reset-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "architecto",
    "email": "zbailey@example.net",
    "password": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTreset-password">
</span>
<span id="execution-results-POSTreset-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTreset-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTreset-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTreset-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTreset-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTreset-password" data-method="POST"
      data-path="reset-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTreset-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTreset-password"
                    onclick="tryItOut('POSTreset-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTreset-password"
                    onclick="cancelTryOut('POSTreset-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTreset-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>reset-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTreset-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTreset-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="token"                data-endpoint="POSTreset-password"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTreset-password"
               value="zbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>zbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTreset-password"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                <h1 id="user-authentication">User authentication</h1>



                                <h2 id="user-authentication-POSTapi-pdf-merge">POST api/pdf/merge</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-pdf-merge">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/pdf/merge" \
    --header "Authorization: Bearer {token}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "pdf_files[]=@/tmp/phpbl2l3un999i66ZOBXVH" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pdf/merge"
);

const headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('pdf_files[]', document.querySelector('input[name="pdf_files[]"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-pdf-merge">
</span>
<span id="execution-results-POSTapi-pdf-merge" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pdf-merge"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pdf-merge"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-pdf-merge" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pdf-merge">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-pdf-merge" data-method="POST"
      data-path="api/pdf/merge"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pdf-merge', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pdf-merge"
                    onclick="tryItOut('POSTapi-pdf-merge');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pdf-merge"
                    onclick="cancelTryOut('POSTapi-pdf-merge');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pdf-merge"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pdf/merge</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-pdf-merge"
               value="Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {token}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-pdf-merge"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-pdf-merge"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>pdf_files</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="file" style="display: none"
                              name="pdf_files[0]"                data-endpoint="POSTapi-pdf-merge"
               data-component="body">
        <input type="file" style="display: none"
               name="pdf_files[1]"                data-endpoint="POSTapi-pdf-merge"
               data-component="body">
    <br>
<p>Must be a file.</p>
        </div>
        </form>

                    <h2 id="user-authentication-POSTapi-pdf-split">POST api/pdf/split</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-pdf-split">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/pdf/split" \
    --header "Authorization: Bearer {token}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "split_page=16"\
    --form "pdf=@/tmp/phphfoq725i54qpeJM4QzW" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pdf/split"
);

const headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('split_page', '16');
body.append('pdf', document.querySelector('input[name="pdf"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-pdf-split">
</span>
<span id="execution-results-POSTapi-pdf-split" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pdf-split"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pdf-split"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-pdf-split" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pdf-split">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-pdf-split" data-method="POST"
      data-path="api/pdf/split"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pdf-split', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pdf-split"
                    onclick="tryItOut('POSTapi-pdf-split');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pdf-split"
                    onclick="cancelTryOut('POSTapi-pdf-split');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pdf-split"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pdf/split</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-pdf-split"
               value="Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {token}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-pdf-split"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-pdf-split"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>pdf</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="pdf"                data-endpoint="POSTapi-pdf-split"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Example: <code>/tmp/phphfoq725i54qpeJM4QzW</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>split_page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="split_page"                data-endpoint="POSTapi-pdf-split"
               value="16"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>16</code></p>
        </div>
        </form>

                    <h2 id="user-authentication-POSTapi-pdf-unlock">POST api/pdf/unlock</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-pdf-unlock">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/pdf/unlock" \
    --header "Authorization: Bearer {token}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "password=|]|{+-"\
    --form "pdf=@/tmp/phpemp8et8lq9ov7SC9zeR" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pdf/unlock"
);

const headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('password', '|]|{+-');
body.append('pdf', document.querySelector('input[name="pdf"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-pdf-unlock">
</span>
<span id="execution-results-POSTapi-pdf-unlock" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pdf-unlock"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pdf-unlock"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-pdf-unlock" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pdf-unlock">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-pdf-unlock" data-method="POST"
      data-path="api/pdf/unlock"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pdf-unlock', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pdf-unlock"
                    onclick="tryItOut('POSTapi-pdf-unlock');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pdf-unlock"
                    onclick="cancelTryOut('POSTapi-pdf-unlock');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pdf-unlock"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pdf/unlock</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-pdf-unlock"
               value="Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {token}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-pdf-unlock"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-pdf-unlock"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>pdf</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="pdf"                data-endpoint="POSTapi-pdf-unlock"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Example: <code>/tmp/phpemp8et8lq9ov7SC9zeR</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-pdf-unlock"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Example: <code>|]|{+-</code></p>
        </div>
        </form>

                    <h2 id="user-authentication-POSTapi-pdf-lock">POST api/pdf/lock</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-pdf-lock">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/pdf/lock" \
    --header "Authorization: Bearer {token}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "password=|]|{+-"\
    --form "pdf=@/tmp/phpn40r0ao3om7sdSRUseH" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pdf/lock"
);

const headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('password', '|]|{+-');
body.append('pdf', document.querySelector('input[name="pdf"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-pdf-lock">
</span>
<span id="execution-results-POSTapi-pdf-lock" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pdf-lock"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pdf-lock"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-pdf-lock" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pdf-lock">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-pdf-lock" data-method="POST"
      data-path="api/pdf/lock"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pdf-lock', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pdf-lock"
                    onclick="tryItOut('POSTapi-pdf-lock');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pdf-lock"
                    onclick="cancelTryOut('POSTapi-pdf-lock');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pdf-lock"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pdf/lock</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-pdf-lock"
               value="Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {token}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-pdf-lock"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-pdf-lock"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>pdf</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="pdf"                data-endpoint="POSTapi-pdf-lock"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Example: <code>/tmp/phpn40r0ao3om7sdSRUseH</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-pdf-lock"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Example: <code>|]|{+-</code></p>
        </div>
        </form>

                    <h2 id="user-authentication-POSTapi-pdf-rotate">POST api/pdf/rotate</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-pdf-rotate">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/pdf/rotate" \
    --header "Authorization: Bearer {token}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "page_number=16"\
    --form "rotation_angle=180"\
    --form "pdf=@/tmp/phparlrgpsb6jg7ayjVLwY" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pdf/rotate"
);

const headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('page_number', '16');
body.append('rotation_angle', '180');
body.append('pdf', document.querySelector('input[name="pdf"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-pdf-rotate">
</span>
<span id="execution-results-POSTapi-pdf-rotate" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pdf-rotate"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pdf-rotate"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-pdf-rotate" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pdf-rotate">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-pdf-rotate" data-method="POST"
      data-path="api/pdf/rotate"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pdf-rotate', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pdf-rotate"
                    onclick="tryItOut('POSTapi-pdf-rotate');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pdf-rotate"
                    onclick="cancelTryOut('POSTapi-pdf-rotate');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pdf-rotate"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pdf/rotate</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-pdf-rotate"
               value="Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {token}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-pdf-rotate"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-pdf-rotate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>pdf</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="pdf"                data-endpoint="POSTapi-pdf-rotate"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Example: <code>/tmp/phparlrgpsb6jg7ayjVLwY</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>page_number</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page_number"                data-endpoint="POSTapi-pdf-rotate"
               value="16"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>rotation_angle</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="rotation_angle"                data-endpoint="POSTapi-pdf-rotate"
               value="180"
               data-component="body">
    <br>
<p>Example: <code>180</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>90</code></li> <li><code>180</code></li> <li><code>270</code></li></ul>
        </div>
        </form>

                    <h2 id="user-authentication-POSTapi-pdf-removePage">POST api/pdf/removePage</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-pdf-removePage">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/pdf/removePage" \
    --header "Authorization: Bearer {token}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "page_number=16"\
    --form "pdf=@/tmp/phpjai0p62m950c6YWaiX2" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pdf/removePage"
);

const headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('page_number', '16');
body.append('pdf', document.querySelector('input[name="pdf"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-pdf-removePage">
</span>
<span id="execution-results-POSTapi-pdf-removePage" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pdf-removePage"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pdf-removePage"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-pdf-removePage" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pdf-removePage">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-pdf-removePage" data-method="POST"
      data-path="api/pdf/removePage"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pdf-removePage', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pdf-removePage"
                    onclick="tryItOut('POSTapi-pdf-removePage');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pdf-removePage"
                    onclick="cancelTryOut('POSTapi-pdf-removePage');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pdf-removePage"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pdf/removePage</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-pdf-removePage"
               value="Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {token}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-pdf-removePage"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-pdf-removePage"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>pdf</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="pdf"                data-endpoint="POSTapi-pdf-removePage"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Example: <code>/tmp/phpjai0p62m950c6YWaiX2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>page_number</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page_number"                data-endpoint="POSTapi-pdf-removePage"
               value="16"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>16</code></p>
        </div>
        </form>

                    <h2 id="user-authentication-POSTapi-pdf-extractPage">POST api/pdf/extractPage</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-pdf-extractPage">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/pdf/extractPage" \
    --header "Authorization: Bearer {token}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "page_number=16"\
    --form "pdf=@/tmp/php9eq4e49saqa0ckuV9d5" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pdf/extractPage"
);

const headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('page_number', '16');
body.append('pdf', document.querySelector('input[name="pdf"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-pdf-extractPage">
</span>
<span id="execution-results-POSTapi-pdf-extractPage" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pdf-extractPage"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pdf-extractPage"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-pdf-extractPage" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pdf-extractPage">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-pdf-extractPage" data-method="POST"
      data-path="api/pdf/extractPage"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pdf-extractPage', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pdf-extractPage"
                    onclick="tryItOut('POSTapi-pdf-extractPage');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pdf-extractPage"
                    onclick="cancelTryOut('POSTapi-pdf-extractPage');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pdf-extractPage"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pdf/extractPage</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-pdf-extractPage"
               value="Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {token}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-pdf-extractPage"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-pdf-extractPage"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>pdf</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="pdf"                data-endpoint="POSTapi-pdf-extractPage"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Example: <code>/tmp/php9eq4e49saqa0ckuV9d5</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>page_number</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page_number"                data-endpoint="POSTapi-pdf-extractPage"
               value="16"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>16</code></p>
        </div>
        </form>

                    <h2 id="user-authentication-POSTapi-pdf-numberPages">POST api/pdf/numberPages</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-pdf-numberPages">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/pdf/numberPages" \
    --header "Authorization: Bearer {token}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "position=top-left"\
    --form "start_number=16"\
    --form "pdf=@/tmp/phph6fl7qmtk5dhfKsnzGT" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pdf/numberPages"
);

const headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('position', 'top-left');
body.append('start_number', '16');
body.append('pdf', document.querySelector('input[name="pdf"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-pdf-numberPages">
</span>
<span id="execution-results-POSTapi-pdf-numberPages" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pdf-numberPages"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pdf-numberPages"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-pdf-numberPages" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pdf-numberPages">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-pdf-numberPages" data-method="POST"
      data-path="api/pdf/numberPages"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pdf-numberPages', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pdf-numberPages"
                    onclick="tryItOut('POSTapi-pdf-numberPages');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pdf-numberPages"
                    onclick="cancelTryOut('POSTapi-pdf-numberPages');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pdf-numberPages"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pdf/numberPages</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-pdf-numberPages"
               value="Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {token}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-pdf-numberPages"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-pdf-numberPages"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>pdf</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="pdf"                data-endpoint="POSTapi-pdf-numberPages"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Example: <code>/tmp/phph6fl7qmtk5dhfKsnzGT</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>position</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="position"                data-endpoint="POSTapi-pdf-numberPages"
               value="top-left"
               data-component="body">
    <br>
<p>Example: <code>top-left</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>bottom-center</code></li> <li><code>bottom-right</code></li> <li><code>bottom-left</code></li> <li><code>top-center</code></li> <li><code>top-right</code></li> <li><code>top-left</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>start_number</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="start_number"                data-endpoint="POSTapi-pdf-numberPages"
               value="16"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>16</code></p>
        </div>
        </form>

                    <h2 id="user-authentication-POSTapi-pdf-create">POST api/pdf/create</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-pdf-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/pdf/create" \
    --header "Authorization: Bearer {token}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"b\",
    \"content\": \"architecto\",
    \"orientation\": \"landscape\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pdf/create"
);

const headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "b",
    "content": "architecto",
    "orientation": "landscape"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-pdf-create">
</span>
<span id="execution-results-POSTapi-pdf-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pdf-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pdf-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-pdf-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pdf-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-pdf-create" data-method="POST"
      data-path="api/pdf/create"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pdf-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pdf-create"
                    onclick="tryItOut('POSTapi-pdf-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pdf-create"
                    onclick="cancelTryOut('POSTapi-pdf-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pdf-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pdf/create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-pdf-create"
               value="Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {token}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-pdf-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-pdf-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-pdf-create"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="content"                data-endpoint="POSTapi-pdf-create"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>orientation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="orientation"                data-endpoint="POSTapi-pdf-create"
               value="landscape"
               data-component="body">
    <br>
<p>Example: <code>landscape</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>portrait</code></li> <li><code>landscape</code></li></ul>
        </div>
        </form>

                    <h2 id="user-authentication-POSTapi-pdf-addWatermark">POST api/pdf/addWatermark</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-pdf-addWatermark">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/pdf/addWatermark" \
    --header "Authorization: Bearer {token}" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "text=b"\
    --form "pdf=@/tmp/phplrfaqq0bnbmcaDFJUI4" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pdf/addWatermark"
);

const headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('text', 'b');
body.append('pdf', document.querySelector('input[name="pdf"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-pdf-addWatermark">
</span>
<span id="execution-results-POSTapi-pdf-addWatermark" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-pdf-addWatermark"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-pdf-addWatermark"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-pdf-addWatermark" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-pdf-addWatermark">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-pdf-addWatermark" data-method="POST"
      data-path="api/pdf/addWatermark"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-pdf-addWatermark', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-pdf-addWatermark"
                    onclick="tryItOut('POSTapi-pdf-addWatermark');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-pdf-addWatermark"
                    onclick="cancelTryOut('POSTapi-pdf-addWatermark');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-pdf-addWatermark"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/pdf/addWatermark</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-pdf-addWatermark"
               value="Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {token}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-pdf-addWatermark"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-pdf-addWatermark"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>pdf</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
 &nbsp;
                <input type="file" style="display: none"
                              name="pdf"                data-endpoint="POSTapi-pdf-addWatermark"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Example: <code>/tmp/phplrfaqq0bnbmcaDFJUI4</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>text</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="text"                data-endpoint="POSTapi-pdf-addWatermark"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>b</code></p>
        </div>
        </form>




    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
