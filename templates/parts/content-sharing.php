<aside class="sharing container">
  <span>Partager sur</span>
  <?php
  $url = get_permalink();
  $title = get_the_title();
  $twitterURL = 'https://twitter.com/intent/tweet?text=' . $title . '&amp;url=' . $url . '&amp;via=wpvkp';
  $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . $url;
  $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $url . '&amp;title=' . $title;
  ?>
  <ul class="sharing__list">
    <li class="sharing__item" data-rs="linkedin">
      <a href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?= $title; ?>&amp;url=<?= $url; ?>" title="" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;&amp;title=<?= $title; ?>&amp;url=<?= $url; ?>','mywindow','menubar=1,resizable=1,width=600,height=500'); return false;" target="_blank" rel="nofollow"><span class="sharing__icon"></span></a>
    </li>
    <li class="sharing__item" data-rs="facebook">
      <a href="https://www.facebook.com/dialog/feed?app_id=1753141581582071&amp;display=popup&amp;name=<?= $title; ?>&amp;link=<?= $url; ?>&amp;redirect_uri=https://www.facebook.com&amp;picture=<?= wp_get_attachment_image_url(get_field('logo', getOptionID()), 'full'); ?>" onclick="window.open('https://www.facebook.com/dialog/feed?app_id=1753141581582071&amp;display=popup&amp;name=<?= $title; ?>&amp;link=<?= $url; ?>&amp;redirect_uri=https://www.facebook.com&amp;picture=<?= wp_get_attachment_image_url(get_field('logo', getOptionID()), 'full'); ?>','mywindow','menubar=1,resizable=1,width=600,height=500'); return false;" target="_blank" rel="nofollow"><span class="sharing__icon"></span></a>
    </li>
    <li class="sharing__item" data-rs="twitter">
      <a href="#" title="" onclick="window.open('https://twitter.com/intent/tweet?text=<?= $title; ?>&amp;url=<?= $url; ?>&amp;counturl=<?= $url; ?>&amp;via=agencekn','mywindow','menubar=1,resizable=1,width=600,height=500'); return false;" target="_blank" rel="nofollow"><span class="sharing__icon"></span></a>
    </li>
  </ul>
</aside>
