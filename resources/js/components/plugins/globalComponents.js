import BaseTable from "../Base/BaseTable.vue"
import BasePagination from '../Base/BasePagination.vue'
import BaseDropdown from '../Base/BaseDropdown.vue'
import BaseButton from '../Base/BaseButton.vue'

export default {
    install(Vue){
        Vue.component(BaseTable.name, BaseTable);
        Vue.component(BasePagination.name, BasePagination);
        Vue.component(BaseDropdown.name,BaseDropdown);
        Vue.component(BaseButton.name,BaseButton);
    }
};