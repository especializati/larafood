import Vue from 'vue'
import Bus from './bus'

// get id tenant
const tenantId = window.Laravel.tenantId;

window.Echo.channel(`larafood_database_private-order-created.${tenantId}`)
.listen('OrderCreated', (e) => {
    Bus.$emit('order.created', e.order)

    Vue.$vToastify.success(`Novo pedido ${e.order.identify}`, 'Novo Pedido')
})