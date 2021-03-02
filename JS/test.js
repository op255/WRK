class Toggle extends React.Component {
    constructor(props) {
      super(props);
      this.state = {isToggleOn: true, cs: "a"};
    }
  
    handleClick() {
      this.setState(state => ({
        isToggleOn: !state.isToggleOn, cs: "b"
      }));
    }
  
    render() {
      return (
        <button className={this.state.cs} onClick={() => this.handleClick()}>
          {this.state.isToggleOn ? 'ON' : 'OFF'}
        </button>
      );
    }
  }
  
  ReactDOM.render(
    <Toggle />,
    document.getElementById('root')
  );