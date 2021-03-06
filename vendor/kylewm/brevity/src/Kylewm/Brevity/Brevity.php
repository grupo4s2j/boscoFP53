<?php
namespace Kylewm\Brevity;

class Brevity
{
    /**
     * Default value for shorten's $format parameter. Format the text as
     * a complete message,
     * e.g.
     * "I had cereal for breakfast today" or
     * "Here is an exhaustive list of my favorite cereals: Peanut Butter Puffins, Honey Nut Morning… http://example.com/cereals"
     */
    const FORMAT_NOTE = 'note';

    /**
     * Possible value for shorten's $format parameter. Same format as
     * FORMAT_NOTE, but limits the truncated length (to 116
     * characters) to leave room for an attached a photo or video.
     */
    const FORMAT_NOTE_WITH_MEDIA = 'note+media';

    /**
     * Possible value for shorten's $format parameter. Format the text as
     * the title of a longer article. $permalink will always be included
     * e.g. "Today's Breakfast: http://example.com/breakfast"
     */
    const FORMAT_ARTICLE = 'article';

    const FORMAT_ARTICLE_WITH_MEDIA = 'article+media';

    const LINKIFY_RE = '/(?:(?:http|https|file|irc):\/{1,3})?(?:[a-z0-9\-]+\.)+[a-z]{2,}(?::\d{2,6})?(?:(?:\/[\w\/.\-_~.;:%?!@$#&()=+]*)|\b)/i';
    const DOMAIN_RE  = '/(?:(?:http|https|file|irc):\/{1,3})?((?:[a-z0-9\-]+\.)+)([a-z]{2,})/i';
    const TLDS = 'aaa aarp abb abbott abogado ac academy accenture accountant accountants aco active actor ad adac ads adult ae aeg aero af afl ag agency ai aig airforce airtel al alibaba alipay allfinanz alsace am amica amsterdam analytics android ao apartments app apple aq aquarelle ar aramco archi army arpa arte as asia associates at attorney au auction audi audio author auto autos aw ax axa az azure ba baidu band bank bar barcelona barclaycard barclays bargains bauhaus bayern bb bbc bbva bcn bd be beats beer bentley berlin best bet bf bg bh bharti bi bible bid bike bing bingo bio biz bj black blackfriday bloomberg blue bm bms bmw bn bnl bnpparibas bo boats boehringer bom bond boo book boots bosch bostik bot boutique br bradesco bridgestone broadway broker brother brussels bs bt budapest bugatti build builders business buy buzz bv bw by bz bzh ca cab cafe cal call camera camp cancerresearch canon capetown capital car caravan cards care career careers cars cartier casa cash casino cat catering cba cbn cc cd ceb center ceo cern cf cfa cfd cg ch chanel channel chat cheap chloe christmas chrome church ci cipriani circle cisco citic city cityeats ck cl claims cleaning click clinic clinique clothing cloud club clubmed cm cn co coach codes coffee college cologne com commbank community company compare computer comsec condos construction consulting contact contractors cooking cool coop corsica country coupons courses cr credit creditcard creditunion cricket crown crs cruises csc cu cuisinella cv cw cx cy cymru cyou cz dabur dad dance date dating datsun day dclk de dealer deals degree delivery dell delta democrat dental dentist desi design dev diamonds diet digital direct directory discount dj dk dm dnp do docs dog doha domains doosan download drive dubai durban dvag dz earth eat ec edeka edu education ee eg email emerck energy engineer engineering enterprises epson equipment er erni es esq estate et eu eurovision eus events everbank exchange expert exposed express fage fail fairwinds faith family fan fans farm fashion fast feedback ferrero fi film final finance financial firestone firmdale fish fishing fit fitness fj fk flights florist flowers flsmidth fly fm fo foo football ford forex forsale forum foundation fox fr fresenius frl frogans fund furniture futbol fyi ga gal gallery game garden gb gbiz gd gdn ge gea gent genting gf gg ggee gh gi gift gifts gives giving gl glass gle global globo gm gmail gmo gmx gn gold goldpoint golf goo goog google gop got gov gp gq gr grainger graphics gratis green gripe group gs gt gu gucci guge guide guitars guru gw gy hamburg hangout haus health healthcare help helsinki here hermes hiphop hitachi hiv hk hm hn hockey holdings holiday homedepot homes honda horse host hosting hoteles hotmail house how hr hsbc ht hu hyundai ibm icbc ice icu id ie ifm iinet il im immo immobilien in industries infiniti info ing ink institute insurance insure int international investments io ipiranga iq ir irish is iselect ist istanbul it itau iwc jaguar java jcb je jetzt jewelry jlc jll jm jmp jo jobs joburg jot joy jp jprs juegos kaufen kddi ke kfh kg kh ki kia kim kinder kitchen kiwi km kn koeln komatsu kp kpn kr krd kred kw ky kyoto kz la lacaixa lamborghini lamer lancaster land landrover lanxess lasalle lat latrobe law lawyer lb lc lds lease leclerc legal lexus lgbt li liaison lidl life lifeinsurance lifestyle lighting like limited limo lincoln linde link live living lixil lk loan loans lol london lotte lotto love lr ls lt ltd ltda lu lupin luxe luxury lv ly ma madrid maif maison makeup man management mango market marketing markets marriott mba mc md me med media meet melbourne meme memorial men menu meo mg mh miami microsoft mil mini mk ml mm mma mn mo mobi mobily moda moe moi mom monash money montblanc mormon mortgage moscow motorcycles mov movie movistar mp mq mr ms mt mtn mtpc mtr mu museum mutuelle mv mw mx my mz na nadex nagoya name navy nc ne nec net netbank network neustar new news nexus nf ng ngo nhk ni nico ninja nissan nl no nokia norton nowruz np nr nra nrw ntt nu nyc nz obi office okinawa om omega one ong onl online ooo oracle orange org organic origins osaka otsuka ovh pa page pamperedchef panerai paris pars partners parts party pe pet pf pg ph pharmacy philips photo photography photos physio piaget pics pictet pictures pid pin ping pink pizza pk pl place play playstation plumbing plus pm pn pohl poker porn post pr praxi press pro prod productions prof promo properties property protection ps pt pub pw py qa qpon quebec racing re read realtor realty recipes red redstone redumbrella rehab reise reisen reit ren rent rentals repair report republican rest restaurant review reviews rexroth rich ricoh rio rip ro rocher rocks rodeo room rs rsvp ru ruhr run rw rwe ryukyu sa saarland safe safety sakura sale salon samsung sandvik sandvikcoromant sanofi sap sapo sarl sas saxo sb sbs sc sca scb schaeffler schmidt scholarships school schule schwarz science scor scot sd se seat security seek select sener services seven sew sex sexy sfr sg sh sharp shell shia shiksha shoes show shriram si singles site sj sk ski skin sky skype sl sm smile sn sncf so soccer social softbank software sohu solar solutions sony soy space spiegel spreadbetting sr srl st stada star starhub statefarm statoil stc stcgroup stockholm storage studio study style su sucks supplies supply support surf surgery suzuki sv swatch swiss sx sy sydney symantec systems sz tab taipei taobao tatamotors tatar tattoo tax taxi tc tci td team tech technology tel telefonica temasek tennis tf tg th thd theater theatre tickets tienda tiffany tips tires tirol tj tk tl tm tmall tn to today tokyo tools top toray toshiba tours town toyota toys tr trade trading training travel travelers travelersinsurance trust trv tt tube tui tushu tv tw tz ua ubs ug uk university uno uol us uy uz va vacations vana vc ve vegas ventures verisign versicherung vet vg vi viajes video villas vin vip virgin vision vista vistaprint viva vlaanderen vn vodka volkswagen vote voting voto voyage vu wales walter wang wanggou watch watches weather webcam weber website wed wedding weir wf whoswho wien wiki williamhill win windows wine wme work works world ws wtc wtf xbox xerox xin xn--11b4c3d xn--1qqw23a xn--30rr7y xn--3bst00m xn--3ds443g xn--3e0b707e xn--3pxu8k xn--42c2d9a xn--45brj9c xn--45q11c xn--4gbrim xn--55qw42g xn--55qx5d xn--6frz82g xn--6qq986b3xl xn--80adxhks xn--80ao21a xn--80asehdb xn--80aswg xn--90a3ac xn--90ais xn--9dbq2a xn--9et52u xn--b4w605ferd xn--c1avg xn--c2br7g xn--cg4bki xn--clchc0ea0b2g2a9gcd xn--czr694b xn--czrs0t xn--czru2d xn--d1acj3b xn--d1alf xn--eckvdtc9d xn--efvy88h xn--estv75g xn--fhbei xn--fiq228c5hs xn--fiq64b xn--fiqs8s xn--fiqz9s xn--fjq720a xn--flw351e xn--fpcrj9c3d xn--fzc2c9e2c xn--g2xx48c xn--gecrj9c xn--h2brj9c xn--hxt814e xn--i1b6b1a6a2e xn--imr513n xn--io0a7i xn--j1aef xn--j1amh xn--j6w193g xn--jlq61u9w7b xn--kcrx77d1x4a xn--kprw13d xn--kpry57d xn--kpu716f xn--kput3i xn--l1acc xn--lgbbat1ad8j xn--mgb9awbf xn--mgba3a3ejt xn--mgba3a4f16a xn--mgbaam7a8h xn--mgbab2bd xn--mgbayh7gpa xn--mgbb9fbpob xn--mgbbh1a71e xn--mgbc0a9azcg xn--mgberp4a5d4ar xn--mgbpl2fh xn--mgbt3dhd xn--mgbtx2b xn--mgbx4cd0ab xn--mk1bu44c xn--mxtq1m xn--ngbc5azd xn--ngbe9e0a xn--node xn--nqv7f xn--nqv7fs00ema xn--nyqy26a xn--o3cw4h xn--ogbpf8fl xn--p1acf xn--p1ai xn--pbt977c xn--pgbs0dh xn--pssy2u xn--q9jyb4c xn--qcka1pmc xn--qxam xn--rhqv96g xn--s9brj9c xn--ses554g xn--t60b56a xn--tckwe xn--unup4y xn--vermgensberater-ctb xn--vermgensberatung-pwb xn--vhquv xn--vuq861b xn--wgbh1c xn--wgbl6a xn--xhq521b xn--xkc2al3hye2a xn--xkc2dl3a5ee0h xn--y9a3aq xn--yfro4i67o xn--ygbi2ammx xn--zfr164b xperia xxx xyz yachts yamaxun yandex ye yodobashi yoga yokohama youtube yt za zara zero zip zm zone zuerich zw';

    private $targetLength = 140;

    private $linkLength = 23;

    function setLinkLength($linkLength) {
        $this->linkLength = $linkLength;
    }

    function setTargetLength($targetLength) {
        $this->targetLength = $targetLength;
    }

    private function hasValidTld($link)
    {
        if (preg_match(self::DOMAIN_RE, $link, $m)) {
            return in_array(mb_strtolower($m[2]), explode(' ', self::TLDS));
        }
        return false;
    }

    function tokenize($text, $skipBareCcTlds=false)
    {
        preg_match_all(self::LINKIFY_RE, $text, $links);
        $splits = preg_split(self::LINKIFY_RE, $text);
        $links = $links[0];

        for ($ii = 0 ; $ii < count($links) ; ++$ii) {
            // trim trailing punctuation
            $link = $links[$ii];
            $jj = mb_strlen($link) - 1;
            while ($jj >= 0 && mb_strstr(".!?,;:)", $link[$jj])
                && ($link[$jj] !== ')' || !mb_strstr($link, '('))) {
                --$jj;
                $links[$ii] = substr($link, 0, $jj+1);
                $splits[$ii+1] = substr($link, $jj+1) . $splits[$ii+1];
                $link = $links[$ii];
            }

            // avoid double linking by looking at preceeding 2 chars
            $prevText = $splits[$ii];
            $nextText = $splits[$ii+1];
            if (preg_match("/=['\"]\\s*$/", $prevText)
                || preg_match('/@\s*$/', $prevText) || preg_match('/^@/', $nextText)
                || preg_match('/^\s*<\/a/', $nextText)
                || !$this->hasValidTld($link)
                || ($skipBareCcTlds
                    && preg_match('/[a-z0-9\-]+\.[a-z]{2}$/i', $link))) {
                $splits[$ii] = $splits[$ii] . $links[$ii];
                $links[$ii] = '';
                continue;
            }
        }

        $result = [];
        for ($ii = 0 ; $ii < max(count($links), count($splits)) ; ++$ii) {
            if ($ii < count($splits) && $splits[$ii] !== '') {
                if ($result && end($result)->tag === 'text') {
                    end($result)->content .= $splits[$ii];
                } else {
                    $result[]= new Token('text', $splits[$ii]);
                }
            }
            if ($ii < count($links) && $links[$ii] !== '') {
                $result[] = new Token('link', $links[$ii]);
            }
        }

        return $result;
    }

    function tweetLength($text) {
        $arr = $this->tokenize($text, true);
        $len = 0;
        foreach ($arr as $tok) {
            if ($tok->tag === 'text') {
                $len += mb_strlen($tok->content);
            } else if ($tok->tag === 'link') {
                $len += 23;
            }
        }
        return $len;
    }

    private function addScheme($url) {
            if (preg_match('/^\/\//', $url) || preg_match('/^(https?|mailto|irc):\/\//', $url)) {
                return $url;
            }
            if (preg_match('/Https?:\/\//', $url)) {
                return 'h'.substr($url, 1);
            }
            return 'http://'.$url;
        }


    function autolink($text) {

        $result = [];
        $tokens = $this->tokenize($text);
        foreach ($tokens as $token) {
            if ($token->tag === 'link') {
                $result[] = '<a class="auto-link" href="' . $this->addScheme($token->content) . '">' . $token->content . '</a>';
            } else {
                $result[] = $token->content;
            }
        }
        return implode($result);
    }

    private function truncateToNearestWord($text, $length)
    {
        $delimiters = ",.;: \t\r\n";
        $text = rtrim($text);
        if (mb_strlen($text) <= $length) {
            return $text;
        }
        // walk backwards until we find a delimiter
        for ($jj = $length-1 ; $jj >= 0 ; --$jj) {
            if (mb_strstr($delimiters, $text[$jj])) {
                return rtrim(substr($text, 0, $jj), $delimiters);
            }
        }
        return substr($text, 0, $length);
    }

    private function tokenLength($token)
    {
        if ($token->tag === 'link') {
            return $this->linkLength;
        }
        return mb_strlen($token->content);
    }

    private function totalLength($tokens)
    {
        $total = 0;
        foreach ($tokens as $token) {
            $total += $this->tokenLength($token);
        }
        return $total;
    }

    function shorten($text, $permalink=false, $permashortlink=false, $permashortcitation=false, $format=self::FORMAT_NOTE)
    {
        $tokens = $this->tokenize($text, true);
        $citationTokens = [];

        if (strpos($format, self::FORMAT_ARTICLE) !== false && $permalink) {
            $citationTokens[] = new Token('text', ': ', true);
            $citationTokens[] = new Token('link', $permalink, true);
        } else if ($permashortlink) {
            $citationTokens[] = new Token('text', ' (', true);
            $citationTokens[] = new Token('link', $permashortlink, true);
            $citationTokens[] = new Token('text', ')', true);
        } else if ($permashortcitation) {
            $citationTokens[] = new Token('text', ' (' . $permashortcitation . ')', true);
        }

        $targetLength = $this->targetLength;
        if (strpos($format, 'media') !== false) {
            $targetLength -= $this->linkLength + 1; // 23 characters + a space
        }

        $baseLength = $this->totalLength($tokens);
        $citationLength = $this->totalLength($citationTokens);

        if ($baseLength + $citationLength <= $targetLength) {
            $tokens = array_merge($tokens, $citationTokens);
        }
        else {
            $ellipsis = mb_convert_encoding('&hellip;', 'UTF-8', 'HTML-ENTITIES');

            // add permalink
            if ($permalink) {
                $tokens[] = new Token('text', $ellipsis . ' ', true);
                $tokens[] = new Token('link', $permalink, true);
            } else {
                $tokens[] = new Token('text', $ellipsis, true);
            }
        }

        // drop or shorten tokens, starting from the end
        for ($ii = count($tokens) -1 ; $ii >= 0 ; --$ii) {
            $token = $tokens[$ii];
            if ($token->required) {
                continue;
            }

            $over = $this->totalLength($tokens) - $targetLength;
            if ($over <= 0) {
                break;
            }

            if ($token->tag === 'link') {
                array_splice($tokens, $ii, 1);
            }
            else if ($token->tag === 'text') {
                $toklen = $this->tokenLength($token);
                if ($over >= $toklen) {
                    array_splice($tokens, $ii, 1);
                }
                else {
                    $token->content = $this->truncateToNearestWord(
                        $token->content, $toklen - $over);
                }
            }
        }

        $result = implode(array_map(
            function($tok) { return $tok->content; },
            $tokens));

        return $result;
    }

}
