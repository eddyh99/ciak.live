<style>
     :focus {
          outline: 0 !important;
          box-shadow: 0 0 0 0 rgba(0, 0, 0, 0) !important;
     }
   .accordion {
        --bs-accordion-bg: #000000;
   }

   .accordion-button {
        color: #ffffff;
   }

   .accordion-button:not(.collapsed){
     background-color: transparent;
     border-bottom: 1px solid white;
     color: #ffffff;
   }

   
     .accordion-button:after {
          background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'><path fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/></svg>") !important;
     }

</style>