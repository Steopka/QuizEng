<script>
    import Input from "./formItem/Input.svelte";
    import Button from "./formItem/Button.svelte";
    import H2 from "./titleItem/H2.svelte";
    import Password from "./formItem/Password.svelte"
    import A from "./titleItem/Link.svelte"


    import { createEventDispatcher } from "svelte";

    let props = {
        inputL: 'login',
        inputP: 'password',
        titleT: 'authorization',
        titleA: 'click me',
        href: '#',
    }

    const dispath = createEventDispatcher();

    let login = ''
    let password = ''

    const handleSubmit = (event) => {
        event.preventDefault()
        dispath('mySubmit', {login, password});
    }
    
</script>

<div class="container">
    <form class="form" on:submit={handleSubmit} >
        <H2 titleH2 = {props.titleT}></H2>
        <Input bind:value = {login} placeholder = {props.inputL}/> 
        <Password bind:value = {password} placeholder = {props.inputP}/>
        <Button class='button'></Button>
        <A title = {props.titleA} href = {props.href}></A>
    </form>
</div>

<style>
    .container {
        display: flex;
        justify-content: center;
    }

    .form {
        padding: 20px;
        box-shadow: 0 3px 30px rgba(0, 0, 0, 0.2);

        border-radius: 10px;
    }
</style>