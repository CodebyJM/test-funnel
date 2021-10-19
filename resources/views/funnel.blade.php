@extends('layout')


@section('main')

<div v-if="currentStep === 1" class="bg-white shadow rounded-lg">

    <div class="sm:px-8 sm:py-10 px-3 py-4">

        <h3 class="text-center mb-6 md:mb-8 text-2xl leading-tight text-gray-700 font-medium">Is this test for you or someone else?</h3>
        
        <div class="max-w-sm mx-auto">
            <input type="radio" id="Me" name="drone" value="Me" checked>
            <label for="Me">Me</label>
        
            <input type="radio" id="someone-else" name="drone" value="someone-else" hecked>
            <label for="someone-else">Someone Else</label>
        </div>

        <p class="mt-1 text-sm text-red-500" v-show="errors.has('medication_rating')" v-html="errors.first('medication_rating')"></p>
    </div>

    <div class="sm:px-8 sm:py-4 p-3 bg-gray-100 rounded-b-lg text-center">
        <button @click="handleForm()" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
            Next &rarr;
        </button>
    </div>

</div>



<div v-if="currentStep === 2" class="bg-white shadow rounded-lg">

    <div class="sm:px-8 sm:py-10 px-3 py-4">

        <h3 class="text-center mb-6 md:mb-8 text-2xl leading-tight text-gray-700 font-medium">On a scale of 1-10 how good do you feel on your current medication(s)?</h3>

        <div class="max-w-sm mx-auto">
            <select class="mt-1 block w-full pl-3 pr-10 py-2 bg-white text-sm border-gray-300 focus:outline-none text-sm rounded-md"
                :class="{'border-red-500': errors.first('medication_rating')}"
                name="medication_rating"                                 
                v-validate="'required'"
                data-vv-as="medication rating"
                v-model="answers.medication_rating">

                <option value="" selected disabled>Select Rating</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>

            <p class="mt-1 text-sm text-red-500" v-show="errors.has('medication_rating')" v-html="errors.first('medication_rating')"></p>
        </div>
    </div>  


    <div class="sm:px-8 sm:py-4 p-3 bg-gray-100 rounded-b-lg text-center">
        <button @click="handleForm()" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
        Next &rarr;
        </button>
    </div>

</div>



<div v-if="currentStep === 3" class="bg-white shadow rounded-lg">

    <div class="sm:px-8 sm:py-10 px-3 py-4">

        <div class="text-center mb-8">
            <h3 class="text-2xl leading-tight text-gray-700 font-medium">What type of prescription medications are you currently taking?</h3>
            <p class="mt-1 text-lg text-gray-600 leading-tight">Please choose all that apply</p>
        </div>
     

        <div class="grid md:grid-cols-2 md:gap-4 gap-2">
 
            <fieldset class="space-y-2">
              
                <div class="relative block rounded border border-gray-300 bg-white shadow-sm px-3 py-2">
                  <div class="relative flex items-center">
                    <div class="flex items-center h-5">
                        <input type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"
                            id="mental_wellness_medications"
                            value="Mental Wellness Medications"
                            v-model="answers.prescription_medications_type">
                    </div>
                    <div class="ml-3">
                      <label for="mental_wellness_medications" class="text-gray-700">Mental Wellness Medications</label>
                    </div>
                  </div>
                </div>

                <div class="relative block rounded border border-gray-300 bg-white shadow-sm px-3 py-2">
                  <div>
                    <div class="relative flex items-center">
                      <div class="flex items-center h-5">
                        <input type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"
                            id="pain_medications"
                            value="Pain Medications"
                            v-model="answers.prescription_medications_type">
                      </div>
                      <div class="ml-3">
                        <label for="pain_medications" class="text-gray-700">Pain Medications</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="relative block rounded border border-gray-300 bg-white shadow-sm px-3 py-2">
                  <div class="relative flex items-center">
                    <div class="flex items-center h-5">
                        <input type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"
                            id="heart_medications"
                            value="Heart Medications"
                            v-model="answers.prescription_medications_type">
                    </div>
                    <div class="ml-3">
                      <label for="heart_medications" class="text-gray-700">Heart Medications</label>
                    </div>
                  </div>
                </div>
            </fieldset>

            <fieldset class="space-y-2">
                <div class="relative block rounded border border-gray-300 bg-white shadow-sm px-3 py-2">
                  <div>
                    <div class="relative flex items-center">
                      <div class="flex items-center h-5">
                        <input type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"
                            id="diabetic_medications"
                            value="Diabetic Medications"
                            v-model="answers.prescription_medications_type">
                      </div>
                      <div class="ml-3">
                        <label for="diabetic_medications" class="text-gray-700">Diabetic Medications</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="relative block rounded border border-gray-300 bg-white shadow-sm px-3 py-2">
                  <div>
                    <div class="relative flex items-center">
                      <div class="flex items-center h-5">
                        <input type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"
                            id="no_prescriptions"
                            value="No Prescriptions"
                            v-model="answers.prescription_medications_type">
                      </div>
                      <div class="ml-3">
                        <label for="no_prescriptions" class="text-gray-700">No Prescriptions</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="relative block rounded border border-gray-300 bg-white shadow-sm px-3 py-2">
                  <div>
                    <div class="relative flex items-center">
                      <div class="flex items-center h-5">
                        <input type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"
                            id="other"
                            value="Other"
                            v-model="answers.prescription_medications_type">
                      </div>
                      <div class="ml-3">
                        <label for="other" class="text-gray-700">Other</label>
                      </div>
                    </div>
                  </div>
                </div>
            </fieldset>

        </div>

        <p class="mt-2 text-sm text-red-500" v-if="checkError.medication_type">At least one medication type needs to be checked.</p>


    </div>  


    <div class="sm:px-8 sm:py-4 p-3 bg-gray-100 rounded-b-lg flex justify-between">
        <button @click="handlePrevious()" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">
        &larr; Previous
        </button>

        <button @click="handleForm()" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
        Next &rarr;
        </button>
    </div>

</div>


<div v-if="currentStep === 4" class="bg-white shadow rounded-lg">
    
    <div v-if="medication.showSuggestions && medication.results" class="sm:px-8 sm:py-4 p-3 bg-gray-100 rounded-b-lg flex justify-between">
        <button @click="handlePrevious()" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">
        &larr; Previous
        </button>

        <button @click="handleForm()" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
        Next &rarr;
        </button>
    </div>

    <div class="sm:px-8 sm:py-10 px-3 py-4">

        <h3 class="mb-6 md:mb-8 text-center text-2xl leading-tight text-gray-700 font-medium">List the medications you are currently taking</h3>
     

        <div class="max-w-md mx-auto">

            <div v-if="answers.medications.length" class="mb-4">
                <div class="text-sm font-medium text-gray-700">Selected Medications</div>

                <span v-for="(med, index) in answers.medications" class="mr-2 mb-1 inline-flex rounded-full items-center py-0.5 pl-3 pr-2 text-sm font-medium bg-blue-100 text-blue-500">
                    <span v-html="med"></span>
                    <button @click="removeSelectedMed(index)" type="button" class="flex-shrink-0 ml-1 h-4 w-4 rounded-full inline-flex items-center justify-center bg-red-200 text-red-500 focus:outline-none">
                        <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                            <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                        </svg>
                    </button>
                </span>
            </div>



            <p class="mb-1 text-sm text-red-500" v-if="checkError.medication">Please select the medications you are taking.</p>

            <div v-click-outside="hideSuggestedMeds" class="mt-1 relative inline-block w-full">
                <input type="text" class="focus:ring-blue-500 focus:border-blue-500 block w-full rounded-md text-sm border-gray-300"
                    :class="{'border-red-500': checkError.medication}"
                    @input="fetchMedication">

 
                <div v-if="medication.showSuggestions && medication.results" class="w-full p-3 origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">

                    <div class="text-sm font-medium text-gray-700 mb-2">Suggestions (please select)</div>
                    
                    <fieldset class="space-y-2">
                        <div v-for="med in medication.results" class="relative flex items-start">
                            <div class="flex items-center h-5">
                                <input type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"
                                    :id="med.slug"
                                    :value="med.display"
                                    v-model="answers.medications">
                            </div>
                            <div class="ml-3 text-sm">
                                <label :for="med.slug" class="font-medium text-gray-600" v-html="med.display"></label>
                            </div>
                        </div>
                    </fieldset>
                </div>


                <p class="mt-1 text-sm text-gray-500">Type in the first few letters of your medication</p>
            </div>

        </div>

    </div>  


    <div class="sm:px-8 sm:py-4 p-3 bg-gray-100 rounded-b-lg flex justify-between">
        <button @click="handlePrevious()" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">
        &larr; Previous
        </button>

        <button @click="handleForm()" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
        Next &rarr;
        </button>
    </div>

</div>

@endsection



@section('scripts')
<script type="text/javascript">
Vue.use(VeeValidate);

Vue.directive('click-outside', {
    bind(el, binding, vnode) {
        var vm = vnode.context;
        var callback = binding.value;

        el.clickOutsideEvent = function (event) {
            if (!(el == event.target || el.contains(event.target))) {
                return callback.call(vm, event);
            }
        };
        document.body.addEventListener('click', el.clickOutsideEvent);
    },
    unbind(el) {
        document.body.removeEventListener('click', el.clickOutsideEvent);
    }
});

var app = new Vue({
    el: '#app',
    data: {
        currentStep: 1,

        continue_url: '',

        submitted: false,
        isSubmitting: false,

        notify: {
            error: false,
            message: true
        },

        medication: {
            debounce: null,
            results: '',
            showSuggestions: true,
        },

        checkError: {
            medication: false,
            medication_type: false,
        },

        stepAndQuestions: {
            1: 'Is this test for you or someone else?',
            2: 'On a scale of 1-10 how good do you feel on your current medication(s)?',
            3: 'What type of prescription medications are you currently taking?',
            4: 'List the medications you are currently taking',
        },

        questionAnswered: [],

        questionViewed: [],

        answers: {
            medication_rating: '',
            health_insurance: '',
            plan_name: '',
            state: '',
            referer: "{{ request()->headers->get('referer') ?? 'https://form.clarityxdna.com' }}",
            utm_source: "{{ request()->utm_source; }}",
            utm_medium: "{{ request()->utm_medium; }}",
            utm_campaign: "{{ request()->utm_campaign; }}",
            utm_term: "{{ request()->utm_term; }}",
            utm_content: "{{ request()->utm_content; }}",
            lead_source: "{{ request()->lead_source; }}",
            url_source: "{{ request()->url_source; }}",
            medications: [],
            prescription_medications_type: []
        }
    },

    watch: {
        'currentStep': function (newValue, oldValue) {
            this.eventViewed(this.stepAndQuestions[newValue], newValue);
        },

        'answers.medications': function (newValue, oldValue) {
            if (newValue.length === 0) {
                this.checkError.medication = true;
            } else {
               this.checkError.medication = false;
            }
        },

        'answers.prescription_medications_type': function (newValue, oldValue) {
            if (newValue.length === 0) {
                this.checkError.medication_type = true;
            } else {
               this.checkError.medication_type = false;
            }
        },   
    },

    mounted () {
        this.eventViewed(this.stepAndQuestions[1], 1);
    },

    methods: {
        handleNext(stepAdvance = false) {
            this.currentStep++;
        },

        handlePrevious(stepAdvance = false) {
            this.currentStep--;
        },

        handleForm(stepAdvance = false) {
            this.$validator.validateAll().then((success) => {

                // Return if validation failed
                if ( ! success ) return;


                // Check for medication errors
                if (this.currentStep === 3 && this.answers.prescription_medications_type.length === 0) {
                    this.checkError.medication_type = true;
                    return;
                }

                // Check for medication errors
                if (this.currentStep === 4 && this.answers.medications.length === 0) {
                    this.checkError.medication = true;
                    return;
                }

                // Record event for answered question
                this.eventAnswered();


                this.currentStep++;
           });     
        },

        completeSubmission () {
            this.$validator.validateAll().then((success) => {

                // Return if validation failed
                if ( ! success ) return;
                
                this.isSubmitting = true;

                axios.post('/submit/lead', this.answers)
                //redirect
                .then(response => {
                    this.isSubmitting = false;
                    this.submitted = true;

                    this.continue_url = response.data.next_from_url;

                    // Record event for answered question
                    this.eventAnswered();

                    // Send completed event
                    /*gtag('event', 'Completed', {
                        'event_category': 'Thank You',
                        'event_label': 'First Form - Thank You'
                    });*/

                    // Taboola Pixel Code
                    //_tfa.push({notify: 'event', name: 'FirstFormComplete', id: 1388801});
                })
                .catch(error => {
                    this.isSubmitting = false;

                    this.notify.error = true;
                    this.notify.message = error.response.data.message;
                });

            });
        },

        hideSuggestedMeds() {
            this.medication.showSuggestions = false;
        },

        removeSelectedMed(index) {
            this.answers.medications.splice(index, 1);
        },

        fetchMedication(event) {
            this.medication.showSuggestions = true;

            clearTimeout(this.medication.debounce);

            this.medication.debounce = setTimeout(() => {
                axios.get('https://www.goodrx.com/api/v4/search/autocomplete?term='+event.target.value)
                .then(response => {
                    this.medication.results = response.data.results; //response.data.results.map(each => each.display);
                })
                .catch(error => {
                   //  this.medication.fetchLoading = false;
                });
            }, 100)
        },

        eventViewed(label, step) {
            if ( this.questionViewed.includes(step) ) return;

            /*gtag('event', 'Viewed', {
                'event_category': 'Form 1',
                'event_label': step +': '+ label
            });*/

            this.questionViewed.push(step)
        },

        eventAnswered() {
            if ( this.questionAnswered.includes(this.currentStep) ) return;

            /*gtag('event', 'Answered', {
                'event_category': 'Form 1',
                'event_label': this.currentStep +': '+ this.stepAndQuestions[this.currentStep]
            });*/

            this.questionAnswered.push(this.currentStep)
        },
    }
})
</script>
@endsection