<style>
  .talas_personalisadas{
      color: white;
  }
  .theme--light.v-label {
    color: rgba(166, 165, 165, 0.6);
  }
  .table th, .table td {
  padding: 1rem;
  vertical-align: top;
  border-top: none;
  }
  .table thead th {
  border-bottom: none;
}
.table thead th {
  border-bottom: none;
}
</style>

<template>
  <table id="dtBasicExample" class="talas_personalisadas table tablesorter" :class="tableClass">
    <thead :class="theadClasses">
      <tr>
        <slot name="columns" :columns="columns">
          <th v-for="column in columns" :key="column">{{ column }}</th>
        </slot>
      </tr>
    </thead>
    <tbody :class="tbodyClasses">
      <tr v-for="(item, index) in data" :key="index">
        <slot :row="item" :index="index">
          <td
            v-for="(column, index) in colsWithValue(item)"
            :key="index">
            {{ itemValue(item, column) }}
          </td>
        </slot>
      </tr>
    </tbody>
  </table>
</template>

<script> 
export default {
  name: 'base-table',
  props: {
    columns: {
      type: Array,
      default: () => [],
      description: 'Table columns'
    },
    data: {
      type: Array,
      default: () => [],
      description: 'Table data'
    },
    type: {
      type: String, // striped | hover
      default: '',
      description: 'Whether table is striped or hover type'
    },
    theadClasses: {
      type: String,
      default: '',
      description: '<thead> css classes'
    },
    tbodyClasses: {
      type: String,
      default: '',
      description: '<tbody> css classes'
    }
  },
  computed: {
    tableClass() {
      return this.type && `table-${this.type}`;
    },
    colsWithValue() {
      return (row) => {
        return this.columns.filter(column => this.hasValue(row, column))
      }
    }
  },
  methods: {
    hasValue(item, column) {
      return item[column.toLowerCase()] !== 'undefined';
    },
    itemValue(item, column) {
      return item[column.toLowerCase()];
    }
  }
};
</script>
