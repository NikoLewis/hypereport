import React, { Component } from 'react';
// import logo from './logo.svg';
import './reportspage.css';

class Reports extends Component {
  constructor(props){
    super(props)
    // this.makeReports = this.makeReports.bind(this)
    this.state = {hasReports:true,reports:[]}
  }

  componentDidMount(){
   // http req goes here
     this.setState.reports = ['Asia', 'Shaun', 'Mae']

     // if(reports.length > 0){
     //   this.setState.hasReports = true;
     //   console.log('hi from CDM if statement');
     //   console.log(reports + 'inside componentDidMount')
     //   console.log(areThereReports + 'does this say true?')
     // }
  }


  render() {
    let reportExist = this.state.hasReports
    let reports = this.state.reports


    let cards = (<div className="card">Darn, we don't have hype yet</div>)

    // if (reportExist){
      let card = function () {
        for(let i = 0; i < 3; i++){
          return (<div className="card">Darn, we don't have hype yet</div>)

          cards = card()
          // `I am $(i)'s card`
          // (<div className="card">this.state.reports[i]</div>)
        // }
      }

    }
    return (
      <div className="App">
        <header className="App-header">
            This will be the DatCode navbar
        </header>
        <div id="card-area"> card layout will go here {cards} </div>

      </div>
    );
  }
}

export default Reports;
