<template>
    <div class="data-view">
        <div 
            v-for="field in fields" 
            :key="field.key"
            class="row m-2"
            >
            <div class="col-md-4 p-2">
                {{ field.label }}
            </div>
            <div class="col-md-8">
                <span v-if="field.type == 'image'">
                    <img :src="showValue(data, field.key)" alt="Logo" width="50" height="50"/>
                </span>
                <span v-else-if="field.type == 'text'">
                    {{ showValue(data, field.key) }}
                </span>
                <span v-else>
                    {{ showValue(data, field.key) }}
                </span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        fields: {
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

    },
    methods: {
        showValue(obj, path) {
            try {
                return path.split('.').reduce((value, key) => (value ? value[key] : ''), obj);
            } catch (e) {
                return obj[path];
            }
        }
    }
}
</script>
