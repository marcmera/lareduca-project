import React, { useState } from 'react';
import { DndProvider } from 'react-dnd';
import { HTML5Backend } from 'react-dnd-html5-backend';
import DraggableItem from '../components/DraggableItem';
import DropTarget from '../components/DropTarget';
import { useNavigate } from 'react-router-dom';
import '../styles/home.css';


function Game() {
  const navigate = useNavigate()
  const item1 = sessionStorage.getItem('item1');
  const item2 = sessionStorage.getItem('item2');
  const item3 = sessionStorage.getItem('item3');


  const [list1, setList1] = useState(['Tormenta', 'Ex', 'Cita']);
  const [list2, setList2] = useState(['Hijos', 'Amor', 'Drogas']);
  const [list3, setList3] = useState(['Aventuras', 'Prostitución', 'Mujeres']);
  const [droppedItems, setDroppedItems] = useState({
    l1: location.state?.selections[0] || null,
    l2: location.state?.selections[1] || null,
    l3: location.state?.selections[2] || null,
  });

  const handleDrop = (targetListId, item) => {
    const newDroppedItems = { ...droppedItems };
    newDroppedItems[targetListId] = item;
    setDroppedItems(newDroppedItems);
  };

  const handleConfirm = () => {
    
    if (droppedItems.l1 && droppedItems.l2 && droppedItems.l3) {
      navigate('/game2');
      sessionStorage.setItem('item4', droppedItems.l1);
      sessionStorage.setItem('item5', droppedItems.l2);
      sessionStorage.setItem('item6', droppedItems.l3);

      
    } else {
      alert('Por favor, selecciona una opción para cada palabra antes de confirmar.');
    }
  };
  return (
    <DndProvider backend={HTML5Backend}>
      <div className="App">
        <div className="Lists">
          <div className="List">
            <h2>Palabra 1</h2>
            {list1.map((item, index) => (
              <DraggableItem key={index} item={item} listId="l1" onDrop={handleDrop} />
            ))}
          </div>

          <div className="List">
            <h2>Palabra 2</h2>
            {list2.map((item, index) => (
              <DraggableItem key={index} item={item} listId="l2" onDrop={handleDrop} />
            ))}
          </div>

          <div className="List">
            <h2>Palabra 3</h2>
            {list3.map((item, index) => (
              <DraggableItem key={index} item={item} listId="l3" onDrop={handleDrop} />
            ))}
          </div>
        </div>

        <div className="Story">
          <h1>Historia Inventada</h1>
          <p>
            Con el tiempo, <label id="item1">{item1} </label> y <label id="item1">{item2} </label>
            comenzaron a pasar más tiempo juntos.
            Descubrieron que compartían una pasión por las <label id="item1">{item3}</label>.
            Juntos exploraron los bosques cercanos, se perdieron en conversaciones interminables y se inspiraron mutuamente en sus respectivas artes.
            Su amor floreció como un jardín en primavera, lleno de colores vibrantes y fragancias dulces.
           </p>
           <p> Sin embargo, el destino tenía desafíos preparados para la pareja.
             Una <DropTarget onDrop={handleDrop} listId="l1" allowedListId="l1">
              {droppedItems.l1 !== null ? <span style={{ fontWeight: 'bold' }}>{droppedItems.l1}</span> : '___'}
              
            </DropTarget> inesperada amenazó con separarlos, pero su amor demostró ser más fuerte.
             Juntos, enfrentaron las adversidades con valentía, apoyándose mutuamente en cada paso del camino. Descubrieron que, a pesar de los desafíos, su amor solo se fortaleció con cada experiencia compartida.
            </p>
            <p>
            Y así, <label id="item1">{item1} </label> y <label id="item1">{item2} </label> continuaron su viaje, construyendo una vida llena de <DropTarget onDrop={handleDrop} listId="l2" allowedListId="l2">
              {droppedItems.l2 !== null ? <span style={{ fontWeight: 'bold' }}>{droppedItems.l2}</span> : '___'}
            </DropTarget>,
            <DropTarget onDrop={handleDrop} listId="l3" allowedListId="l3">
              {droppedItems.l3 !== null ? <span style={{ fontWeight: 'bold' }}>{droppedItems.l3}</span> : '___'}
            </DropTarget> y superando cualquier obstáculo que la vida les presentara. Su historia se convirtió en un recordatorio de que,
              a veces, los encuentros fortuitos pueden convertirse en los capítulos más significativos de nuestras vidas.
          </p>
          <button onClick={handleConfirm}>
            Confirmar
          </button>
        </div>
      </div>
    </DndProvider>);
}

export default Game;
