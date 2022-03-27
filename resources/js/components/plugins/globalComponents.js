import BaseTable from "../Base/BaseTable.vue";
import BasePagination from '../Base/BasePagination.vue';
import BaseDropdown from '../Base/BaseDropdown.vue';
import BaseButton from '../Base/BaseButton.vue';
import Modal from '../Base/Modal.vue';
import CloseButton from '../Base/CloseButton.vue';

export default {
    install(Vue) {
        Vue.component(BaseTable.name, BaseTable);
        Vue.component(BasePagination.name, BasePagination);
        Vue.component(BaseDropdown.name, BaseDropdown);
        Vue.component(BaseButton.name, BaseButton);
        Vue.component(Modal.name, Modal);
        Vue.component(CloseButton.name, CloseButton);
    }
};