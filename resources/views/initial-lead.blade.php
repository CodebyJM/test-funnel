@extends('layout')


@section('main')

<template v-if="submitted === false">
 
    <div v-if="currentStep === 1" class="bg-white shadow rounded-lg">

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


    <div v-if="currentStep === 2" class="bg-white shadow rounded-lg">

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


    <div v-if="currentStep === 3" class="bg-white shadow rounded-lg">
        
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


    <div v-if="currentStep === 4" class="bg-white shadow rounded-lg">

        <div class="sm:px-8 sm:py-10 px-3 py-4">
            <h3 class="text-center mb-6 md:mb-8 text-2xl leading-tight text-gray-700 font-medium">Do you have health insurance?</h3>

            <div class="max-w-sm mx-auto">
                <select class="mt-1 block w-full pl-3 pr-10 py-2 bg-white text-sm border-gray-300 focus:outline-none text-sm rounded-md"
                    :class="{'border-red-500': errors.first('health_insurance')}"
                    name="health_insurance"                                 
                    v-validate="'required'"
                    data-vv-as="health insurance"
                    v-model="answers.health_insurance">

                    <option value="" selected disabled>Please Select</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>

                <p class="mt-1 text-sm text-red-500" v-show="errors.has('health_insurance')" v-html="errors.first('health_insurance')"></p>
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



    <!-- yes to health insurance  -->
    <div v-if="currentStep === 5" class="bg-white shadow rounded-lg">

        <div class="sm:px-8 sm:py-10 px-3 py-4">
            <h3 class="text-center mb-6 md:mb-8 text-2xl leading-tight text-gray-700 font-medium">What is the name of your plan?</h3>

            <div class="max-w-sm mx-auto">

                <div v-click-outside="hideSuggestedHealthPlans" class="mt-1 relative inline-block w-full">
                    <input type="text" class="focus:ring-blue-500 focus:border-blue-500 block w-full rounded-md text-sm border-gray-300"
                        :class="{'border-red-500': errors.first('plan_name')}"
                        name="plan_name"                                 
                        v-validate="'required'"
                        data-vv-as="plan name"
                        @input="fetchHealthPlans"
                        v-model="answers.plan_name">

     
                    <div v-if="healthPlan.showSuggestions" class="w-full origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">

                        <div class="py-3 px-4">
                            <div v-for="plan in healthPlan.result" class="font-medium text-gray-600 text-sm py-1 cursor-pointer" @click="updateHealthPlanName(plan.item)">
                                <span v-html="plan.item"></span>
                            </div>
                        </div>

                    </div>
                </div>

                <p class="mt-1 text-sm text-red-500" v-show="errors.has('plan_name')" v-html="errors.first('plan_name')"></p>
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


    <div v-if="currentStep === 6" class="bg-white shadow rounded-lg">

        <div class="sm:px-8 sm:py-10 px-3 py-4">
            <h3 class="text-center mb-6 md:mb-8 text-2xl leading-tight text-gray-700 font-medium">What state do you live in?</h3>

            <div class="max-w-sm mx-auto">
                <select class="mt-1 block w-full pl-3 pr-10 py-2 bg-white text-sm border-gray-300 focus:outline-none text-sm rounded-md"
                    :class="{'border-red-500': errors.first('state')}"
                    name="state"                                 
                    v-validate="'required'"
                    data-vv-as="state"
                    v-data-as=""
                    v-model="answers.state">

                    <option value="" selected disabled>Select State</option>
                    <option value="Alabama">Alabama</option>
                    <option value="Alaska">Alaska</option>
                    <option value="Arizona">Arizona</option>
                    <option value="Arkansas">Arkansas</option>
                    <option value="California">California</option>
                    <option value="Colorado">Colorado</option>
                    <option value="Connecticut">Connecticut</option>
                    <option value="Delaware">Delaware</option>
                    <option value="District Of Columbia">District Of Columbia</option>
                    <option value="Florida">Florida</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Hawaii">Hawaii</option>
                    <option value="Idaho">Idaho</option>
                    <option value="Illinois">Illinois</option>
                    <option value="Indiana">Indiana</option>
                    <option value="Iowa">Iowa</option>
                    <option value="Kansas">Kansas</option>
                    <option value="Kentucky">Kentucky</option>
                    <option value="Louisiana">Louisiana</option>
                    <option value="Maine">Maine</option>
                    <option value="Maryland">Maryland</option>
                    <option value="Massachusetts">Massachusetts</option>
                    <option value="Michigan">Michigan</option>
                    <option value="Minnesota">Minnesota</option>
                    <option value="Mississippi">Mississippi</option>
                    <option value="Missouri">Missouri</option>
                    <option value="Montana">Montana</option>
                    <option value="Nebraska">Nebraska</option>
                    <option value="Nevada">Nevada</option>
                    <option value="New Hampshire">New Hampshire</option>
                    <option value="New Jersey">New Jersey</option>
                    <option value="New Mexico">New Mexico</option>
                    <option value="New York">New York</option>
                    <option value="North Carolina">North Carolina</option>
                    <option value="North Dakota">North Dakota</option>
                    <option value="Ohio">Ohio</option>
                    <option value="Oklahoma">Oklahoma</option>
                    <option value="Oregon">Oregon</option>
                    <option value="Pennsylvania">Pennsylvania</option>
                    <option value="Rhode Island">Rhode Island</option>
                    <option value="South Carolina">South Carolina</option>
                    <option value="South Dakota">South Dakota</option>
                    <option value="Tennessee">Tennessee</option>
                    <option value="Texas">Texas</option>
                    <option value="Utah">Utah</option>
                    <option value="Vermont">Vermont</option>
                    <option value="Virginia">Virginia</option>
                    <option value="Washington">Washington</option>
                    <option value="West Virginia">West Virginia</option>
                    <option value="Wisconsin">Wisconsin</option>
                    <option value="Wyoming">Wyoming</option>

                </select>

                <p class="mt-1 text-sm text-red-500" v-show="errors.has('state')" v-html="errors.first('state')"></p>
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

    </div>


    <div v-if="currentStep === 7" class="bg-white shadow rounded-lg">

        <div class="sm:px-8 sm:py-10 px-3 py-4">
            <h3 class="text-center mb-6 md:mb-8 text-2xl leading-tight text-gray-700 font-medium">What is the first and last name on your insurance card?</h3>


            <div class="grid grid-cols-1 gap-y-4 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="first_name" class="block text-sm font-medium text-gray-600">First Name</label>
                    <div class="mt-1">
                        <input type="text" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full text-sm border-gray-300 rounded-md"
                            :class="{'border-red-500': errors.first('first_name')}"
                            name="first_name"
                            v-validate="'required'"
                            data-vv-as="first name"
                            v-model="answers.first_name">
                        <p class="mt-1 text-sm text-red-500" v-show="errors.has('first_name')" v-html="errors.first('first_name')"></p>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="last_name" class="block text-sm font-medium text-gray-600">Last Name</label>
                    <div class="mt-1">
                        <input type="text" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full text-sm border-gray-300 rounded-md"
                            :class="{'border-red-500': errors.first('last_name')}"
                            name="last_name"
                            v-validate="'required'"
                            data-vv-as="last name"
                            v-model="answers.last_name">

                        <p class="mt-1 text-sm text-red-500" v-show="errors.has('last_name')" v-html="errors.first('last_name')"></p>
                    </div>
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


    <div v-if="currentStep === 8" class="bg-white shadow rounded-lg">

        <div class="sm:px-8 sm:py-10 px-3 py-4">
            <p class="text-gray-700"><span v-html="answers.first_name"></span> <span v-html="answers.last_name"></span>, We need to verify if your <span v-html="answers.plan_name"></span> insurance will cover the cost of the ClarityX test for you.</p>
            <p class="mt-2 text-gray-700">Please click <strong>next</strong> to continue.</p>

            <center>
                <img class="w-auto h-40" src="/assets/loading-checking.gif" alt="">
            </center>
        </div>

        <div class="sm:px-8 sm:py-4 p-3 bg-gray-100 rounded-b-lg flex justify-between">
            <button @click="handlePrevious()" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">
            &larr; Previous
            </button>

            <button @click="handleNext()" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
            Next &rarr;
            </button>
        </div>

    </div>


    <div v-if="currentStep === 9" class="bg-white shadow rounded-lg">

        <div class="sm:px-8 sm:py-10 px-3 py-4">
            <h3 class="text-center mb-6 md:mb-8 text-2xl leading-tight text-gray-700 font-medium">What number can we send a verification text to?</h3>

            <div class="max-w-sm mx-auto">

                <input type="text" name="phone_number"
                    class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full text-sm border-gray-300 rounded-md"
                    :class="{'border-red-500': errors.first('phone_number')}"
                    v-validate="'required|phoneNumber'"
                    v-mask="'(###) ###-####'"
                    placeholder="(___) ___-____" 
                    data-vv-as="phone number"
                    v-model="answers.phone_number">

                <p class="mt-1 text-sm text-red-500" v-show="errors.has('phone_number')" v-html="errors.first('phone_number')"></p>
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


    <div v-if="currentStep === 10" class="bg-white shadow rounded-lg">

        <div class="sm:px-8 sm:py-10 px-3 py-4">
            <p class="text-gray-700"><span v-html="answers.first_name"></span> <span v-html="answers.last_name"></span>, it looks like your <span v-html="answers.plan_name"></span> insurance plan will cover the cost of the ClarityX test for you.</p>
            <p class="mt-2 text-gray-700">Please click <strong>next</strong> to continue.</p>

            <center>
                <img class="w-auto h-40" src="/assets/loading-success.gif" alt="">
            </center>
        </div>


        <div class="sm:px-8 sm:py-4 p-3 bg-gray-100 rounded-b-lg flex justify-between">
            <button @click="handlePrevious()" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">
            &larr; Previous
            </button>

            <button @click="handleNext()" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
            Next &rarr;
            </button>
        </div>

    </div>


    <div v-if="currentStep === 11" class="bg-white shadow rounded-lg">

        <div class="sm:px-8 sm:py-10 px-3 py-4">
            <h3 class="text-center mb-6 md:mb-8 text-2xl leading-tight text-gray-700 font-medium">What is the best email to send you updates on the status of receiving your ClarityX Test</h3>

            <div class="max-w-sm mx-auto">

                <input type="text" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full text-sm border-gray-300 rounded-md"
                    :class="{'border-red-500': errors.first('email_address')}"
                    name="email_address"
                    v-validate="'required|email'"
                    data-vv-as="email address"
                    v-model="answers.email_address">

                <p class="mt-1 text-sm text-red-500" v-show="errors.has('email_address')" v-html="errors.first('email_address')"></p>

            </div>

        </div>

        <div class="sm:px-8 sm:py-4 p-3 bg-gray-100 rounded-b-lg flex justify-between">
            <button @click="handlePrevious()" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">
            &larr; Previous
            </button>

            <button @click="handleForm(13)" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
            Next &rarr;
            </button>
        </div>

    </div>



    <!-- NO to health insurance  -->
    <div v-if="currentStep === 12" class="bg-white shadow rounded-lg">

        <div class="sm:px-8 sm:py-10 px-3 py-4">


            <div class="grid grid-cols-1 sm:grid-cols-2 mb-4 pb-4 border-b border-dashed">
                <div class="sm:col-span-1">
                    <img class="w-auto h-32 m-auto" src="{{ url('assets/clarityx-box.png') }}" alt="ClarityX">
                </div>
                <div class="sm:col-span-1 text-center sm:text-left sm:flex sm:items-center">
                    <div class="font-bold text-lg">
                        Get your test kit today for only:
                        <span class="block font-bold text-green-500">$330</<span>
                    </div>
                    
                </div>
            </div>


            <div class="text-center mb-6">
                <h3 class="text-2xl leading-tight text-gray-700 font-medium">We can send you additional information for a self pay option.</h3>
                <p class="mt-1 text-lg text-gray-600 leading-tight">Please fill out the information below</p>
            </div>

            <div class="mb-4 grid grid-cols-1 gap-y-4 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="first_name" class="block text-sm font-medium text-gray-600">First Name</label>
                    <div class="mt-1">
                        <input type="text" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full text-sm border-gray-300 rounded-md"
                            :class="{'border-red-500': errors.first('first_name')}"
                            name="first_name"
                            v-validate="'required'"
                            data-vv-as="first name"
                            v-model="answers.first_name">
                        <p class="mt-1 text-sm text-red-500" v-show="errors.has('first_name')" v-html="errors.first('first_name')"></p>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="last_name" class="block text-sm font-medium text-gray-600">Last Name</label>
                    <div class="mt-1">
                        <input type="text" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full text-sm border-gray-300 rounded-md"
                            :class="{'border-red-500': errors.first('last_name')}"
                            name="last_name"
                            v-validate="'required'"
                            data-vv-as="last name"
                            v-model="answers.last_name">

                        <p class="mt-1 text-sm text-red-500" v-show="errors.has('last_name')" v-html="errors.first('last_name')"></p>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="email_address" class="block text-sm font-medium text-gray-600">Email Address</label>
                <input type="text" class="mt-1 shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full text-sm border-gray-300 rounded-md"
                    :class="{'border-red-500': errors.first('email_address')}"
                    name="email_address"
                    v-validate="'required|email'"
                    data-vv-as="email address"
                    v-model="answers.email_address">

                <p class="mt-1 text-sm text-red-500" v-show="errors.has('email_address')" v-html="errors.first('email_address')"></p>
            </div>


            <div>
                <label for="phone_number" class="block text-sm font-medium text-gray-600">Phone Number</label>
                <input type="text" name="phone_number"
                    class="mt-1 shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full text-sm border-gray-300 rounded-md"
                    placeholder="(___) ___-____" 
                    v-mask="'(###) ###-####'"
                    v-model="answers.phone_number">
                <p class="mt-1 text-sm text-gray-500">Please put a number to receive a text verification</p>
            </div>

        </div>

        <div class="sm:px-8 sm:py-4 p-3 bg-gray-100 rounded-b-lg flex justify-between">
            <button @click="handlePrevious(4)" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">
            &larr; Previous
            </button>

            <button @click="handleForm(13)" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
            Next &rarr;
            </button>
        </div>

    </div>



    <!-- Terms  -->
    <div v-if="currentStep === 13" class="bg-white shadow rounded-lg">

        <div class="sm:px-8 sm:py-10 px-3 py-4">
            <h3 class="text-center mb-6 md:mb-8 text-2xl leading-tight text-gray-700 font-medium">Terms and Conditions</h3>


            <div class="border bg-gray-50 rounded-sm p-2.5 text-gray-700 text-sm md:h-auto h-48 overflow-scroll">
                <p>By Selecting "I Accept" you verify and consent to be contacted and receive information by ClarityX. You may be contacted by phone, email or text by our customer support team. You may revoke this consent at any time by contacting us via phone or unsubscribing.For example, by remembering your contact and other information when you access or use the Site.</p>
            </div>


            <div class="flex items-start mt-4">
                <div class="flex items-center h-5">
                    <input id="terms_accepted" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"
                        name="terms_accepted"
                        v-validate="'required'"
                        data-vv-as="terms and conditions"
                        v-model="answers.terms_accepted">
                </div>
                <div class="ml-3 text-sm">
                    <label for="comments" class="font-medium text-gray-700">I Accept</label>
                    <p class="text-gray-500">Please click I Accept to submit your Information.</p>
                </div>
            </div>

            <p class="mt-1 text-sm text-red-500" v-show="errors.has('terms_accepted')" v-html="errors.first('terms_accepted')"></p>
        
        </div>

        <div class="sm:px-8 sm:py-4 p-3 bg-gray-100 rounded-b-lg flex justify-between">
            <button @click="handlePrevious()" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">
            &larr; Previous
            </button>

            <button @click="completeSubmission()" :disabled="isSubmitting" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                <svg v-if="isSubmitting" class="animate-spin h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span v-if="isSubmitting">Please Wait...</span>
                <span v-else>Submit</span>
            </button>
        </div>

    </div>


</template>


<div v-if="submitted === true" class="bg-white shadow sm:rounded-lg">

    <div class="px-8 py-6 md:py-12 text-center">
        <center>
            <img class="h-20 w-20" src="{{ url('assets/check-icon.png') }}">
        </center>

        <h3 class="text-lg font-bold mt-5 mb-1 leading-tight text-gray-700">Thank you for your completed submission!</h3>
        <p class="text-gray-600">For the next steps in receiving your ClarityX test you can check your email or click continue below.</p>
    </div>  


    <div class="px-8 py-4 bg-gray-100 sm:rounded-b-lg text-center">
        <a :href="continue_url" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
        Continue &rarr;
        </a>
    </div>

</div>


 <div aria-live="assertive" class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start">
    <div class="w-full flex flex-col items-center space-y-4">
      
      <transition enter-active-class="transform ease-out duration-300 transition" enter-from-class="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2" enter-to-class="translate-y-0 opacity-100 sm:translate-x-0" leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
        <div v-if="notify.error" class="max-w-lg w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
          <div class="p-4">
            <div class="flex items-start">
              <div class="flex-shrink-0">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

              </div>
              <div class="ml-3 w-0 flex-1 pt-0.5">
                <p class="text-sm font-medium text-gray-900">
                    Something went wrong!
                </p>
                <p class="mt-1 text-sm text-gray-500" v-html="notify.message"></p>
              </div>
              <div class="ml-4 flex-shrink-0 flex">
                <button @click="notify.error = false" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                  <span class="sr-only">Close</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </div>
  </div>
@endsection



@section('scripts')
<script type="text/javascript">
Vue.use(VeeValidate);
Vue.directive('mask', VueMask.VueMaskDirective);

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

const phoneNumberRule = {
    getMessage(field, args) {
        return `The ${field} must be a valid phone number`;
    },

    validate(value, args) {
        const mobileReg = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
        return mobileReg.test(value);
    }
};
VeeValidate.Validator.extend('phoneNumber', phoneNumberRule);


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
            showSuggestions: false,
        },

        healthPlan: {
            debounce: null,
            showSuggestions: false,
            result: '',
            list: ["Aetna", "Anthem", "Blue Cross Blue Sheild", "Cigna", "Coventry", "Highmark", "Humana", "Wellpoint", "Kaiser", "United Healthcare", "Medicare"],
        },

        checkError: {
            medication: false,
            medication_type: false,
        },

        stepAndQuestions: {
            1: 'On a scale of 1-10 how good do you feel on your current medication(s)?',
            2: 'What type of prescription medications are you currently taking?',
            3: 'List the medications you are currently taking',
            4: 'Do you have health insurance?',
            5: 'What is the name of your plan?',
            6: 'What state do you live in?',
            7: 'What is the first and last name on your insurance card?',
            8: 'Insurance verification',
            9: 'What number can we send a verification text to?',
            10: 'Insurance verification processed',
            11: 'What is the best email to send you updates on the status of receiving your ClarityX Test',
            12: 'We can send you additional information for a self pay option.',
            13: 'Terms and Conditions',
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
            if (stepAdvance) {
                this.currentStep = stepAdvance;
            } else {
                this.currentStep++;
            }
        },

        handlePrevious(stepAdvance = false) {
            // Insurance question previous
            if ( this.currentStep === 13) {
                if ( this.answers.health_insurance === "Yes")
                    this.currentStep = 11
                else
                    this.currentStep = 12
                
                return;
            }

                
            if (stepAdvance) {
                this.currentStep = stepAdvance;
            } else {
                this.currentStep--;
            }
        },

        handleForm(stepAdvance = false) {
            this.$validator.validateAll().then((success) => {

                // Return if validation failed
                if ( ! success ) return;


                // Check for medication errors
                if (this.currentStep === 2 && this.answers.prescription_medications_type.length === 0) {
                    this.checkError.medication_type = true;
                    return;
                }

                // Check for medication errors
                if (this.currentStep === 3 && this.answers.medications.length === 0) {
                    this.checkError.medication = true;
                    return;
                }


                // Record event for answered question
                this.eventAnswered();


                // Insurance question advance
                if ( this.currentStep === 4 ) {
                    if ( this.answers.health_insurance === "Yes")
                        this.currentStep = 5
                    else
                        this.currentStep = 12

                    return;
                }


                // Progress to the next step
                if (stepAdvance) {
                    this.currentStep = stepAdvance;
                } else {
                    this.currentStep++;
                }

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
                    gtag('event', 'Completed', {
                        'event_category': 'Thank You',
                        'event_label': 'First Form - Thank You'
                    });

                    // Taboola Pixel Code
                    _tfa.push({notify: 'event', name: 'FirstFormComplete', id: 1388801});
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

        hideSuggestedHealthPlans() {
            this.healthPlan.showSuggestions = false;
        },

        fetchHealthPlans(event) {
            this.healthPlan.showSuggestions = true;

            clearTimeout(this.healthPlan.debounce);

            this.healthPlan.debounce = setTimeout(() => {

                const fuse = new Fuse(this.healthPlan.list, {includeScore: true });
                this.healthPlan.result = fuse.search(event.target.value);

                // Update the plane name in answers as the user types
                this.answers.plan_name = event.target.value;

                // If there is no result hide the suggestion
                if ( ! this.healthPlan.result.length ) {
                    this.healthPlan.showSuggestions = false;
                }

            }, 100)
        },

        updateHealthPlanName(planName) {
            this.answers.plan_name = planName;
            this.healthPlan.showSuggestions = false;
        },

        eventViewed(label, step) {
            if ( this.questionViewed.includes(step) ) return;

            gtag('event', 'Viewed', {
                'event_category': 'Form 1',
                'event_label': step +': '+ label
            });

            this.questionViewed.push(step)
        },

        eventAnswered() {
            if ( this.questionAnswered.includes(this.currentStep) ) return;

            gtag('event', 'Answered', {
                'event_category': 'Form 1',
                'event_label': this.currentStep +': '+ this.stepAndQuestions[this.currentStep]
            });

            this.questionAnswered.push(this.currentStep)
        },
    }
})
</script>
@endsection