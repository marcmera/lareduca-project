import { useNavigate } from 'react-router-dom'

function Final() {
  const navigate = useNavigate()
  let fin;
  if (sessionStorage.getItem('item5') === "Amor") {
    fin = '/img/bodaB3.jpg'
  }else if (sessionStorage.getItem('item5') === "Hijos") {
    fin = '/img/bodaB1.jpg'
  } else if (sessionStorage.getItem('item5') === "Drogas") {
    fin = '/img/bodaB2.jpg'
  }
  const handleConfirm = () => {
    navigate('/home');
  
  };

  return (
    <div>
      <div className="Story">
      {fin && <img src={fin} alt="final" />}
      </div>
      <button onClick={handleConfirm}>
    Home
  </button>
    </div>
    
    
  )
}

export default Final