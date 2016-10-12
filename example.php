<?php
$rss = new rss($db, 'articles');

?>
<rss version="2.0">
    <channel>
        <title>TITLE OF THIS RSS FLUX</title>
        <description>DESCRIPTION OF THIS RSS FLUX</description>
        <lastBuildDate><?= $rss->getLastBuildDate() ?></lastBuildDate>
        <link>LINK OF THIS RSS FLUX</link>
        <?php
        foreach ($rss->getRss(0, 25) AS $infos) {
            ?>
            <item>
                <title>TITLE OF THIS ITEM</title>
                <description>DESCRIPTION OF THIS ITEM</description>
                <pubDate>DATE OF PUBLICATION<!-- note : use getRssDate(DATE) class function for return a date to RSS date format --></pubDate>
                <link>LINK OF THIS ITEM</link>             
                <image><!--optionaly-->
                    <url>URL OF IMAGE (HTML ACCESS)</url>
                    <link>LINK OF IMAGE (HREF ACCESS)</link>
                </image>
            </item>
            <?php
        }
        ?>
    </channel>
</rss>