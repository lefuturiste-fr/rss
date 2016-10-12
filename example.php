<?php
header('Content-Type: application/rss+xml');

$rss = new rss($db, 'articles');
?>
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
    <channel>
        <title></title>
        <description></description>
        <lastBuildDate><?= $rss->getLastBuildDate() ?></lastBuildDate>
        <link></link>
        <?php
        foreach ($rss->getRss(0, 25) AS $infos) {
            ?>
            <item>
                <title><?= $infos['name'] ?></title>
                <description><?= substr($infos['desc_'], 0, 500).'...' ?></description>
                <pubDate><?= date(DATE_RSS, strtotime($infos['date_time_post'])) ?></pubDate>
                <link><?= $infos['id']?></link>
                <image>
                    <url><?= $infos['url_img']?></url>
                    <link><?= $infos['id']?></link>
                </image>
            </item>
            <?php
        }
        ?>
    </channel>
</rss>