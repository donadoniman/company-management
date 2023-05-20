<template>
    <div class="data-table">
        <table class="table">
            <thead>
                <tr>
                    <!-- Render table headers -->
                    <th class="table-head" v-for="header in headers" :key="header.key">
                        {{ header.label }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- Render table rows -->
                <tr v-for="row in items" :key="row.id" @click="rowClick(row.id)">
                    <td v-for="header in headers" :key="`${row.id}-${header.key}`">
                        <span v-if="header.type == 'image'">
                            <img :src="showValue(row, header.key)" alt="Logo" width="50" height="50"/>
                        </span>
                        <span v-else-if="header.type == 'text'">
                            {{ showValue(row, header.key) }}
                        </span>
                        <span v-else>
                            {{ showValue(row, header.key) }}
                        </span>
                    </td>
                    
                </tr>
            </tbody>
        </table>

        <!-- Render pagination links -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li v-for="link in pages" :key="link.label" class="page-item" :class="[{ active: link.active }, { disabled: !link.url }]" :aria-disabled="!link.url">
                    <a class="page-link" :href="link.url"><span v-html="link.label"></span></a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    props: {
        headers: {
            type: Array,
            required: true,
        },
        data: {
            type: Object,
            required: true,
        }
    },
    data() {
        return {
            
        }
    },
    mounted(){
        console.log(this.data, 'data');
    },
    computed: {
        items(){
            return this.data.data;
        },
        pages(){
            return this.data.links;
        }
    },
    methods: {
        showValue(obj, path) {
            try {
                return path.split('.').reduce((value, key) => (value ? value[key] : ''), obj);
            } catch (e) {
                return obj[path];
            }
        },
        rowClick(id) {
            document.location.href = `${this.data.path}/${id}`;
        }
    }
}
</script>
