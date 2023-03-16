import VueCookies from 'vue-cookies'
// use(VueCookies);
export default function checkAdmin(to, from, next) {
  const role = this.$cookies.get('role')
  console.log('role: ' + role);
  if (role !== '1') {
    next('/403') 
  } else {
    next() 
  }
}