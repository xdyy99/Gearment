export default function datepicker() {
  // for date
  if (document.querySelector('[data-toggle="datepicker"]')) {
    (function ($) {
      $.fn.datepicker.languages['viva'] = {
        format: 'dd/mm/yy',
        days: ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy'],
        daysShort: ['CN', 'Hai', 'Ba', 'Tư', 'Năm', 'Sáu', 'Bảy'],
        daysMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
        months: [
          'Tháng một',
          'Tháng hai',
          'Tháng ba',
          'Tháng tư',
          'Tháng năm',
          'Tháng sáu',
          'Tháng bảy',
          'Tháng tám',
          'Tháng chín',
          'Tháng mười',
          'Tháng mười một',
          'Tháng mười hai',
        ],
        monthsShort: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
        weekStart: 1,
        startView: 0,
        yearFirst: true,
        yearSuffix: '',
      };
      $('[data-toggle="datepicker"]').datepicker({
        language: 'viva',
        format: 'dd tháng mm, yyyy',
      });
    })(jQuery);
  }
}
