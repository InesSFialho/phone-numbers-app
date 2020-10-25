<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul>
                    <li v-for="customer in customers" :key="customer.id">
                        {{ customer.id }} - {{ customer.name }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['customers'],
        data: () => {
            return {

            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
