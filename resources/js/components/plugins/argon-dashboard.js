import "../../../../public/assets/vendor/nucleo/css/nucleo.css";
import globalComponents from "./globalComponents";

export default {
  install(Vue) {
    Vue.use(globalComponents);
  }
};