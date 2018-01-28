<template>
    <div class="">        
        <form :id="id" :class="css" :action="action" :method="defineMetodo" :enctype="enctype">
            <input v-if="alteraMethod" type="hidden" name="_method" :value="alteraMethod">
            <input v-if="token" type="hidden" name="_token" :value="token">
                <slot></slot>
        </form>
    </div>
</template>

<script>
export default {
  props: ["css", "action", "method", "enctype", "token", "id"],
  data: function() {
    return {
      alteraMethod: ""
    };
  },
  computed: {
    defineMetodo() {
      if (this.method) {
        if (
          this.method.toLowerCase() == "post" ||
          this.method.toLowerCase() == "get"
        ) {
          return this.method.toLowerCase();
        }
        if (this.method.toLowerCase() == "put") {
          this.alteraMethod = "put";
        }
        if (this.method.toLowerCase() == "delete") {
          this.alteraMethod = "delete";
        }
      }
      return "post";
    }
  }
};
</script>
