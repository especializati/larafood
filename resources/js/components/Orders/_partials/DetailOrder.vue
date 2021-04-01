<template>
    <div id="exampleModalLive" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" :style="{display: display}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Detalhes do Pedido {{ order.identify }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeDetails">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" class="form form-inline" @submit.prevent="updateStatus">
                        <label for="status">Status:</label>
                        <select name="status" class="form-control" v-model="status">
                            <option value="open">Aberto</option>
                            <option value="done">Completo</option>
                            <option value="rejected">Rejeitado</option>
                            <option value="working">Andamento</option>
                            <option value="canceled">Cancelado</option>
                            <option value="delivering">Em transito</option>
                        </select> |
                        <button type="submit" class="btn btn-info" :disabled="loading">
                            Atualizar Status
                        </button>
                    </form>
                    <ul>
                        <li>Número do pedido: {{ order.identify }}</li>
                        <li>Total: R$ {{ total }}</li>
                        <li>Status: {{ order.status_label }}</li>
                        <li>Data: {{ order.date_br }}</li>
                        <li>
                            Cliente:
                            <ul>
                                <li>Nome: {{ order.client.name }}</li>
                                <!-- <li>image: {{ order.image }}</li> -->
                                <!-- <li>uuid: {{ order.uuid }}</li> -->
                                <li>Contato: {{ order.client.contact }}</li>
                            </ul>
                        </li>
                        <li>Mesa: {{ order.table.name }}</li>
                        <li>
                            Produtos:
                            <ul>
                                <li v-for="(product, index) in order.products" :key="index">
                                    <img :src="product.image" :alt="product.title" style="max-width: 100px;">
                                    {{ product.title }}
                                </li>
                            </ul>
                        </li>
                        <li>
                            Avaliações:
                            <ul>
                                <li v-for="(evaluation, index) in order.evaluations" :key="index">
                                    Nota: {{ evaluation.stars }}/4
                                    <br>Comentário: {{ evaluation.comment }}
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        display: {
            required: true
        },
        order: {
            type: Object,
            required: true
        }
    },
    computed: {
        total () {
            return this.order.total.toLocaleString('pt-br', {minimumFractionDigits: 2})
        }
    },
    data() {
        return {
            status: '',
            loading: false
        }
    },
    methods: {
        closeDetails () {
            this.$emit('closeDetails')
        },
        updateStatus() {
            this.loading = true

            axios.patch('/api/v1/my-orders', {
                status: this.status,
                identify: this.order.identify
            })
            .then(response => this.$emit('statusUpdated'))
            .catch(error => alert('error'))
            .finally(() => this.loading = false)
        }
    },
    watch: {
        order () {
            this.status = this.order.status
        }
    },
}
</script>
