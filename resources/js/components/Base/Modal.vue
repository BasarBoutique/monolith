<style>
.modal{
  background: rgba(0, 0, 0, 0.37);
}
.modal-dialog-centered{
  justify-content: center;
  min-height: calc(100%);
}
</style>
<template>
  <SlideYUpTransition :duration="animationDuration">
      <div id="MyModal" class="modal"
          @click.self="closeModal"
          :class="[{'show d-block': show}, {'d-none': !show}, {'modal-mini': type === 'mini'}]"
          v-show="show"
          tabindex="-1"
          role="dialog"  aria-labelledby="exampleModalLabel"
          :aria-hidden="!show" data-backdrop="static" data-keyboard="false">

        <div class="modal-dialog-centered">
          <div class="modal-content" style="width: 30%" >
            <div class="modal-header" :class="[headerClasses]" v-if="$slots.header">
              <slot name="header"></slot>
            </div>

            <div class="modal-body" :class="bodyClasses">
              <slot></slot>
            </div>

            <div class="modal-footer" :class="footerClasses" v-if="$slots.footer">
              <slot name="footer"></slot>
            </div>
          </div>
        </div>
      </div>
  </SlideYUpTransition>
</template>
<script>
import { SlideYUpTransition } from "vue2-transitions";
export default {
  name: "modal",
  components: {
    SlideYUpTransition
  },
  props: {
    show: Boolean,
    showClose: {
      type: Boolean,
      default: true
    },
    type: {
      type: String,
      default: "",
      validator(value) {
        let acceptedValues = ["", "notice", "mini"];
        return acceptedValues.indexOf(value) !== -1;
      },
      description: 'Modal type (notice|mini|"") '
    },
    modalClasses: {
      type: [Object, String],
      description: "Modal dialog css classes"
    },
    modalContentClasses: {
      type: [Object, String],
      description: "Modal dialog content css classes"
    },
    gradient: {
      type: String,
      description: "Modal gradient type (danger, primary etc)"
    },
    headerClasses: {
      type: [Object, String],
      description: "Modal Header css classes"
    },
    bodyClasses: {
      type: [Object, String],
      description: "Modal Body css classes"
    },
    footerClasses: {
      type: [Object, String],
      description: "Modal Footer css classes"
    },
    animationDuration: {
      type: Number,
      default: 500,
      description: "Modal transition duration"
    }
  },
  methods: {
    closeModal() {
      this.$emit("update:show", false);
      this.$emit("close");
    }
  },
  watch: {
    show(val) {
      let documentClasses = document.body.classList;
      if (val) {
        documentClasses.add("modal-open");
      } else {
        documentClasses.remove("modal-open");
      }
    }
  }
};
</script>