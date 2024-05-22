// DraggableItem.jsx
import React from 'react';
import { useDrag } from 'react-dnd';

const DraggableItem = ({ item, listId, onDrop }) => {
  const [{ isDragging }, drag] = useDrag({
    type: 'ITEM',
    item: { content: item, listId },
  });

  return (
    <div ref={drag} className={`DraggableItem ${isDragging ? 'dragging' : ''}`}>
      {item}
    </div>
  );
};

export default DraggableItem;
