const dataObj = {
    message: 'Hello',
    seen: true,
}

const objMethods = {
    toggleSeen() {
        this.seen = !this.seen
    },
}

const optObject = {
    el: "#app",
    data: dataObj,
    methods: objMethods,
}
const app = new Vue(optObject)
// app.newMessage = 'Welcome to iitm online degree'
// setInterval(() => {
//     app.count -= 1
// }, 1000
// )