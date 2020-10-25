<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="d-flex float-right">
                    <div class="input-group mb-3">

                        <select class="custom-select" @change="onChangeCountry($event)">
                            <option selected>Country</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Uganda">Uganda</option>
                        </select>
                    </div>
                    <!-- <div class="input-group mb-3 ml-2">
                        <select class="custom-select" @change="onChangeState($event)">
                            <option selected>State</option>
                            <option value="Valid">Valid</option>
                            <option value="Not Valid">Not Valid</option>
                        </select>
                    </div> -->
                </div>
                <ul class="list-group list-group-item-action active">
                    <li class="list-group-item border-0 list-group-item list-group-item-action" v-for="customer in filtered" :key="customer.id">
                        <h5>{{ customer.name }}</h5>
                        <div class="d-flex float-right">
                            <div>
                            <span class="badge badge-primary mr-2">{{ customer.country }}</span>
                            </div>
                            <div v-if="customer.state === 'Not Valid'">
                                <span class='badge badge-danger'>{{ customer.state }}</span>
                            </div>
                            <div v-else>
                                <span class='badge badge-success'>{{ customer.state }}</span>
                            </div>
                        </div>
                        <span class="badge badge-dark">{{ customer.code }}</span>
                        <small>{{ customer.number }}</small>
                    </li>
                </ul>
                <ul class="list-group list-group-item-action active" v-if="seen">
                    <li class="list-group-item border-0 list-group-item list-group-item-action" v-for="customer in customers" :key="customer.id">
                        <h5>{{ customer.name }}</h5>
                        <div class="d-flex float-right">
                            <div>
                            <span class="badge badge-primary mr-2">{{ customer.country }}</span>
                            </div>
                            <div v-if="customer.state === 'Not Valid'">
                                <span class='badge badge-danger'>{{ customer.state }}</span>
                            </div>
                            <div v-else>
                                <span class='badge badge-success'>{{ customer.state }}</span>
                            </div>
                        </div>
                        <span class="badge badge-dark">{{ customer.code }}</span>
                        <small>{{ customer.number }}</small>
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
                filtered: null,
                seen: true,
                
            }
        },
        methods: {
            onChangeCountry(event) {
                this.filtered = this.customers.filter((el) => {
                    return (el.country == event.target.value)
                })

                if (event.target.value === 'Country') {
                    this.seen = true
                } else {
                    this.seen = false
                }

            }
        },
    }
</script>
