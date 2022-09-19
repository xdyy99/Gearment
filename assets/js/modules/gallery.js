export default function gallery() {
  $('.galleryJS').each(function () {
    const $this = $(this);
    const $item = $this.find('.gItem');
    $(function () {
      $this.lightGallery({
        speed: 500,
        selector: $item,
        thumbnail: true,
        zoom: true,
        // mode: 'lg-fade',

        // Disable
        autoplayControls: false,
        flipHorizontal: false,
        flipVertical: false,
        rotate: false,
        share: false,
        fullScreen: false,
        actualSize: false,
      });
    });
  });
}
