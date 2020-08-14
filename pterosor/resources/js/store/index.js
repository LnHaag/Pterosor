import createPersistedState from "vuex-persistedstate";
import { forEach } from "lodash";

export default {

    state: {
      people : [],
      person:{},
    },
    
    mutations: {
       setPeople(state, people) {
        state.people = people;
      },
      setPerson(state, person) {
        state.person = person; 
      },
    },
    actions: {    
  
       async getPeople(state) {
  
        const peopleRaw = await fetch('http://localhost:8000/api/people', { headers: { 
            "Content-Type": "application/json"
          }  
        });
  
        const validPeople = await status(peopleRaw)
  
        const people = await validPeople.json();
  
        state.commit("setPeople", people.data );
        
      }, 
  
    },
  
    modules: {
    },
  
    getters: {
  
      getPeople(state) {
        return state.people;
      },
      getPerson(state) {
        return state.person; 
      //},
     
    },
  
    plugins: [createPersistedState()]
  }
}