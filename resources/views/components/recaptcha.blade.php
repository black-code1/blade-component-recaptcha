<div x-data="recaptcha()" x-init="init" @recaptcha.window="execute"></div>

@push('scripts')
<script src="https://www.google.com/recaptcha/api.js?render=explicit"></script>

<script>
  window.recaptcha =  () => {
    return {
      init() {
        // render
        grecaptcha.ready(() => {
          grecaptcha.render(this.$el, {
            sitekey: '{{ config('services.recaptcha.key') }}',
            size: 'invisible',
            callback: this.onComplete.bind(this)
          })
        })
      },

      execute() {
        alert('execute')
        grecaptcha.execute();
      },

      onComplete() {
         //this.$el.closest("form").submit();
        // dispatch an event anouncing that recaptcha verification is complete
        // and we are ready to submit the form
        //this.$el.dispatchEvent(
        //  new CustomEvent('recaptcha-complete', {bubbles: true})
        //)
      }
    };
  };
</script>
@endpush