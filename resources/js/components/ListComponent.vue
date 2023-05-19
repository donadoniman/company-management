<template>
    <div class="data-table">
        <div class="main-table">
            <table class="table">
                <thead>
                    <tr>
                        <th class="table-head">#</th>
                        <th v-for="column in columns" :key="column" class="table-head">
                            {{ column | columnHead }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="" v-if="datas.length === 0">
                        <td class="lead text-center" :colspan="columns.length + 1">No data found.</td>
                    </tr>
                    <tr v-for="(data, key1) in datas" :key="data.id" class="m-datatable__row" v-else>
                        <td>{{ serialNumber(key1) }}</td>
                        <td v-for="(value, key) in data">{{ value }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        datas: { type: Array, required: true },
        columns: { type: Array, required: true },
    },
    data() {
        return {
            pagination: {
                meta: { to: 1, from: 1 }
            },
            offset: 4,
            currentPage: 1,
            perPage: 5,
            order: 'asc'
        }
    },
    created() {

    },
    computed: {
        /**
         * Get the pages number array for displaying in the pagination.
         * */
        pagesNumber() {
            if (!this.pagination.meta.to) {
                return []
            }
            let from = this.pagination.meta.current_page - this.offset
            if (from < 1) {
                from = 1
            }
            let to = from + (this.offset * 2)
            if (to >= this.pagination.meta.last_page) {
                to = this.pagination.meta.last_page
            }
            let pagesArray = []
            for (let page = from; page <= to; page++) {
                pagesArray.push(page)
            }
            return pagesArray
        },
        /**
         * Get the total data displayed in the current page.
         * */
        totalData() {
            return (this.pagination.meta.to - this.pagination.meta.from) + 1
        }
    },
    methods: {
        /**
         * Get the serial number.
         * @param key
         * */
        serialNumber(key) {
            return (this.currentPage - 1) * this.perPage + 1 + key
        },
        /**
         * Change the page.
         * @param pageNumber
         */
        changePage(pageNumber) {
            this.currentPage = pageNumber
        },
        /**
         * Sort the data by column.
         * */
        sortByColumn(column) {
            if (column === this.sortedColumn) {
                this.order = (this.order === 'asc') ? 'desc' : 'asc'
            } else {
                this.sortedColumn = column
                this.order = 'asc'
            }
        }
    },
    filters: {
        columnHead(value) {
            return value.split('_').join(' ').toUpperCase()
        }
    },
}
</script>
