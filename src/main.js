// import App from './App.svelte';

// const app = new App({
// 	target: document.body,
// 	props: {
// 		name: 'world'
// 	}
// });

// export default app;

import Authorization from './frontend/pages/Authorization.svelte';

const app = new Authorization({
	target: document.body,
})

export default app;