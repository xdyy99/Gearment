</main>

<footer class="footer">
  <div class="container">
    <div class="footer-main">
      <div class="col-2">
        <a href="/" class="footer-logo">
          <img src="<?php echo ASSETS . '/images/logo-footer.svg'; ?>" alt="" />
        </a>
        <?php if (is_active_sidebar('footer-col-1')) dynamic_sidebar('footer-col-1');  ?>
      </div>
      <div class="col-2">
        <?php if (is_active_sidebar('footer-col-2')) dynamic_sidebar('footer-col-2');  ?>
      </div>
      <div class="col-2">
        <?php if (is_active_sidebar('footer-col-3')) dynamic_sidebar('footer-col-3');  ?>
      </div>
      <div class="col-2">
        <?php if (is_active_sidebar('footer-col-4')) dynamic_sidebar('footer-col-4');  ?>
      </div>
      <div class="col-2">
        <?php if (is_active_sidebar('footer-col-5')) dynamic_sidebar('footer-col-5');  ?>
      </div>
    </div>
    <div class="footer-line"></div>
    <div class="footer-copyright">
      <div class="col-6">
        <div class="footer-copytxt">©<?php echo date("Y"); ?> Gearment Inc. All Rights Reserved.</div>
        <?php if (is_active_sidebar('footer-policy')) dynamic_sidebar('footer-policy');  ?>
      </div>
      <div class="col-6">
        <?php if (is_active_sidebar('footer-social')) dynamic_sidebar('footer-social');  ?>
      </div>
    </div>
  </div>
</footer>

<script src="<?php echo ASSETS . '/js/libs/swiper/swiper-bundle.min.js'; ?>"></script>
<script src="<?php echo ASSETS . '/js/main.js'; ?>" type="module"></script>
<script src="<?php echo ASSETS . '/js/extra.js'; ?>"></script>
<script src="https://wchat.freshchat.com/js/widget.js"></script>
<style>
  #fc_frame,
  #fc_frame.fc-widget-small {
    width: 60px;
    bottom: 9rem;
    left: unset;
    right: 2rem;
    z-index: 5;
  }

  #fc_frame.fc-open,
  #fc_frame.fc-widget-small.fc-open {
    z-index: 21;
  }

  .betterdocs-widget-container {
    bottom: 3rem;
    z-index: 5;
  }

  .betterdocs-launcher[type="button"].betterdocs-launcher {
    margin: 0 !important;
  }

  .betterdocs-widget-container.betterdocs-opened {
    z-index: 21;
  }

  #fc_frame.h-open-container,
  #fc_frame.fc-widget-small.h-open-container {
    max-height: 80vh;
  }

  @media screen and (max-width: 800px) {
    .betterdocs-launcher[type="button"].betterdocs-launcher {
      margin: 0 1rem 1rem !important;
    }

    .betterdocs-launcher[type="button"].betterdocs-launcher {
      width: 50px;
      height: 50px;
    }

  }
</style>
<script>
  window.fcWidget.init({
    token: "96630134-3d66-4442-8312-5ca6e7f6d0fc",
    host: "https://wchat.freshchat.com",
    config: {
      disableEvents: true,
      cssNames: {
        widget: 'custom_fc_frame',
      },
      headerProperty: {
        direction: 'ltr' //will move widget to left side of the screen
      },
      showFAQOnOpen: true,
      hideFAQ: true,
      agent: {
        hideName: false,
        hidePic: false,
        hideBio: false,
      },
      content: {
        placeholders: {
          search_field: 'Search',
          reply_field: 'Reply',
          csat_reply: 'Add your comments here'
        },
        actions: {
          csat_yes: 'Yes',
          csat_no: 'No',
          push_notify_yes: 'Yes',
          push_notify_no: 'No',
          tab_faq: 'Solutions',
          tab_chat: 'Chat',
          csat_submit: 'Submit'
        },
        headers: {
          chat: 'Chat with Us',
          chat_help: 'Reach out to us if you have any questions',
          faq: 'Solution Articles',
          faq_help: 'Browse our articles',
          faq_not_available: 'No Articles Found',
          faq_search_not_available: 'No articles were found for {{query}}',
          faq_useful: 'Was this article helpful?',
          faq_thankyou: 'Thank you for your feedback',
          faq_message_us: 'Message Us',
          push_notification: 'Don\'t miss out on any replies! Allow push notifications?',
          csat_question: 'Has your problem been solved yet?<br />(Vấn đề của bạn đã được giải quyết chưa ?) ',
          csat_yes_question: 'How would you rate this interaction?',
          csat_no_question: 'How could we have helped better?',
          csat_thankyou: 'Thanks for the response',
          csat_rate_here: 'Submit your rating here (Đánh giá độ hài lòng của bạn)',
          channel_response: {
            offline: 'We are currently away. Please leave us a message',
            online: {
              minutes: {
                one: "Currently replying in {!time!} minutes ",
                more: "Typically replies in {!time!} minutes"
              },
              hours: {
                one: "Currently replying in under an hour",
                more: "Typically replies in {!time!} hours",
              }
            }
          }
        }
      }
    }
  });
</script>
<?php wp_footer(); ?>
</body>

</html>