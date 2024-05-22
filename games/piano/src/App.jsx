import React, { useState } from 'react';
import { Piano, KeyboardShortcuts, MidiNumbers } from 'react-piano';
import 'react-piano/dist/styles.css';
import * as Tone from 'tone';

function App() {
  const firstNote = MidiNumbers.fromNote('c3');
  const lastNote = MidiNumbers.fromNote('f4');
  const keyboardShortcuts = KeyboardShortcuts.create({
    firstNote: firstNote,
    lastNote: lastNote,
    keyboardConfig: KeyboardShortcuts.HOME_ROW,
  });

  const synth = new Tone.Synth().toDestination();

  const [notesPlayedSequence, setNotesPlayedSequence] = useState([]);
  const [notesPlayedManual, setNotesPlayedManual] = useState([]);
  const [highlightedNotes, setHighlightedNotes] = useState([]);

  const playRandomSequence = () => {
    const notes = generateRandomNotes(firstNote, lastNote, 8); // Cambia 8 al número de notas que desees en la secuencia
    let index = 0;
    const intervalId = setInterval(() => {
      if (index < notes.length) {
        synth.triggerAttackRelease(Tone.Midi(notes[index]).toFrequency(), '1'); // Duración de 1 segundo
        setNotesPlayedSequence((prevNotes) => [...prevNotes, notes[index]]);
        setHighlightedNotes([notes[index]]);
        index++;
      } else {
        clearInterval(intervalId);
        setHighlightedNotes([]);
      }
    }, 500); // Intervalo entre cada nota en milisegundos (en este caso, medio segundo)
  };

  const generateRandomNotes = (min, max, count) => {
    const notes = [];
    for (let i = 0; i < count; i++) {
      const randomNote = Math.floor(Math.random() * (max - min + 1)) + min;
      notes.push(randomNote);
    }
    return notes;
  };

  return (
    <div className="flex flex-col items-center justify-center h-screen bg-gray-900 text-white">
      <button className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4" onClick={playRandomSequence}>Crear secuencia</button>
      <div className="mb-4 flex flex-row">
        <p className="font-bold mr-2">Notas tocadas en secuencia:</p>
        <ul className="flex flex-wrap">
          {notesPlayedSequence.map((note, index) => (
            <li key={index} className="mr-2">{MidiNumbers.getAttributes(note).note}</li>
          ))}
        </ul>
      </div>
      <div className="mb-4">
        <p className="font-bold mb-2">Notas tocadas manualmente:</p>
        <ul className="flex flex-wrap">
          {notesPlayedManual.map((note, index) => (
            <li key={index} className="mr-2">{MidiNumbers.getAttributes(note).note}</li>
          ))}
        </ul>
      </div>
      <div className="mb-4">
        <Piano
          noteRange={{ first: firstNote, last: lastNote }}
          playNote={(midiNumber) => {
            // Trigger the note to play
            synth.triggerAttack(Tone.Midi(midiNumber).toFrequency());
            setTimeout(() => {
              synth.triggerRelease();
              setHighlightedNotes([]);
            }, 500); // Duración de 1 segundo
            setNotesPlayedManual((prevNotes) => [...prevNotes, midiNumber]);
            setHighlightedNotes([midiNumber]);
          }}
          stopNote={(midiNumber) => {
            // Stop the note immediately if it's still playing
            synth.triggerRelease();
            setHighlightedNotes([]);
          }}
          highlightedNotes={highlightedNotes}
          width={1000}
          keyboardShortcuts={keyboardShortcuts}
        />
      </div>
    </div>
  );
}

export default App;
