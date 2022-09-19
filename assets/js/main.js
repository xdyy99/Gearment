//===== IMPORT MODULES =====//

// Core
import menu from './modules/menu.js';
import swiper from './modules/swiper.js';
import tab from './modules/tab.js';
import toggle from './modules/toggle.js';

// Form
import filter from './modules/filter.js';

// Animation
import design from './modules/design.js';
import inter from './modules/inter.js';
import map from './modules/map.js';
import video from './modules/video.js';
import stepSlide from './modules/stepSlide.js';

//===== EXECUTE =====//
jQuery(document).ready(function ($) {
  // Core
  try {
    menu();
  } catch {
    console.error('Menu error!');
  }
  try {
    swiper();
  } catch {
    console.error('Swiper error!');
  }
  try {
    design();
  } catch {
    console.error('Design section error!');
  }
  try {
    inter();
  } catch {
    console.error('Inter section error!');
  }
  try {
    map();
  } catch {
    console.error('Map section error!');
  }
  try {
    video();
  } catch {
    console.error('Video section error!');
  }
  try {
    stepSlide();
  } catch {
    console.error('Step slide section error!');
  }
  try {
    toggle();
  } catch {
    console.error('Toggle section error!');
  }
  try {
    tab();
  } catch {
    console.error('Tab section error!');
  }

  try {
    filter();
  } catch {
    console.error('Filter error!');
  }

  //
  // Form

  //
  // Animation
});
